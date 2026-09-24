<?php

use App\Models\Careers;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\News;
use App\Models\Page;
use App\Models\Media;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Services;
use Illuminate\Support\Str;
use App\Models\MenuLocation;
use App\Models\Project;
use App\Models\Service;

function getMenus($id)
{
    $nav = MenuLocation::where('location', $id)->first();
    if ($nav) {
        $sitemenu = json_decode($nav->content);
        $sitemenu = $sitemenu[0];
        foreach ($sitemenu as $menu) {
            $menu->title = Menu::where('id', $menu->id)->value('title');
            $menu->name = Menu::where('id', $menu->id)->value('name');
            $menu->slug = Menu::where('id', $menu->id)->value('slug');
            $menu->target = Menu::where('id', $menu->id)->value('target');
            $menu->type = Menu::where('id', $menu->id)->value('type');
            if (!empty($menu->children[0])) {
                foreach ($menu->children[0] as $child) {
                    $child->title = Menu::where('id', $child->id)->value('title');
                    $child->name = Menu::where('id', $child->id)->value('name');
                    $child->slug = Menu::where('id', $child->id)->value('slug');
                    $child->target = Menu::where('id', $child->id)->value('target');
                    $child->type = Menu::where('id', $child->id)->value('type');

                    if (!empty($child->children[0])) {
                        foreach ($child->children[0] as $subchild) {
                            $subchild->title = Menu::where('id', $subchild->id)->value('title');
                            $subchild->name = Menu::where('id', $subchild->id)->value('name');
                            $subchild->slug = Menu::where('id', $subchild->id)->value('slug');
                            $subchild->target = Menu::where('id', $subchild->id)->value('target');
                            $subchild->type = Menu::where('id', $subchild->id)->value('type');

                            if (!empty($subchild->children[0])) {
                                foreach ($subchild->children[0] as $newchild) {
                                    $newchild->title = Menu::where('id', $newchild->id)->value('title');
                                    $newchild->name = Menu::where('id', $newchild->id)->value('name');
                                    $newchild->slug = Menu::where('id', $newchild->id)->value('slug');
                                    $newchild->target = Menu::where('id', $newchild->id)->value('target');
                                    $newchild->type = Menu::where('id', $newchild->id)->value('type');
                                }
                            }
                        }
                    }
                }
            }
        }

        return $sitemenu;
    }
}

function getPages()
{
    return Page::where('status', 1)->orderBy('created_at', 'DESC')->get();
}

function getBlog($limit, $id = '')
{
    return News::where('status', 1)->where('id', $id)->oldest('created_at')->limit($limit)->get();
}

function getSettings()
{
    return Setting::pluck('value', 'key')->toArray();
}

function getPagesById($id)
{
    return Page::where('status', 1)->where('id', $id)->first();
}

function onlyService($id)
{
    return $id ? Services::where('status', 1)->where('id', $id)->first() : null;
}

function getCareerById($id)
{
    if ($id != null) {
        return Careers::where('id', $id)->first();
    } else {
        return null;
    }
}

function getService()
{
    return Service::where('status', 1)->oldest('order')->limit(5)->get();
}

function getReviewByID($id = [])
{
    if ($id != null) {
        return Review::whereIn('id', $id)->get();
    } else {
        return null;
    }
}

function getProjectByID($id = [])
{
    if ($id != null) {
        return Project::whereIn('id', $id)->get();
    } else {
        return null;
    }
}

function getServiceByID($id = [])
{
    if ($id != null) {
        return Services::whereIn('id', $id)->get();
    } else {
        return null;
    }
}

function getFaqByID($Id)
{
    return Faq::where('id', $Id)->first();
}

if (!function_exists('make_slug')) {
    function make_slug($string)
    {
        return Str::slug($string);
    }
}

if (! function_exists('galleryfileUpload')) {
    function galleryfileUpload($request, $name, $foldername)
    {
        try {
            if ($request->hasFile($name)) {
                // get uploaded file
                $image = $request->file($name);

                // custom file name
                $imageName = time() . '-' . rand(0, 99) . '-' . $image->getClientOriginalName();

                // upload to S3 with public visibility
                $path = $image->storeAs(
                    trim($foldername, '/'),   // folder name
                    $imageName,               // file name
                    ['disk' => 's3', 'visibility' => 'public']
                );

                // return the full public URL (Laravel handles it)
                return Storage::disk('s3')->url($path);
            }

            return null;
        } catch (\Exception $e) {
            // optional: log error if needed
            // \Log::error('Gallery upload failed: '.$e->getMessage());
            return null;
        }
    }
}
if (! function_exists('deletesettingmedia')) {
    function deletesettingmedia($image, $old_image, $image_name, $siteSetting, $siteSettings)
    {
        if ($image) {
            removeFile($old_image);  // delete old image from S3
            $siteSetting[$image_name] = $image;
        } else {
            $siteSetting[$image_name] = $siteSettings[$image_name];
        }

        return $siteSetting[$image_name];
    }
}
if (! function_exists('fileUpload')) {
    function fileUpload($request, $name, $folder)
    {
        try {
            if ($request->hasFile($name)) {
                $bucket = "academic-routes-consultancy"; // static bucket name
                $baseUrl = "https://s3-np1.datahub.com.np";

                // Determine folder path
                $folderPath = $folder ? trim($folder, '/') : ''; // if folder is passed, use it; else root

                // store file in S3
                $path = $request->file($name)->storePublicly($folderPath, 's3');

                // build full URL
                $fullUrl = rtrim($baseUrl, '/') . '/' . trim($bucket, '/') . '/' . ltrim($path, '/');
                return $fullUrl;
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (! function_exists('removeFile')) {
    function removeFile($fileUrl)
    {
        try {
            $bucket = "academic-routes-consultancy"; // same static bucket name
            $baseUrl = "https://s3-np1.datahub.com.np";

            // Remove base URL + bucket from the full file URL to get the relative path
            $prefix = rtrim($baseUrl, '/') . '/' . trim($bucket, '/');
            $path = str_replace($prefix . '/', '', $fileUrl);

            // Delete if exists
            if (Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
                return true;
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}

if (!function_exists('stripLetters')) {
    function stripLetters($text, $number, $last = "")
    {
        if (!empty($text)) {
            if (strlen($text) < $number) {
                return strip_tags(html_entity_decode($text));
            } else {
                return substr(strip_tags(html_entity_decode($text)), 0, $number) . $last;
            }
        }
    }
}

if (!function_exists('image_sizes')) {
    function image_sizes()
    {
        $size = [
            'single' => ['width' => 756, 'height' => 414],
            'about' => ['width' => 568, 'height' => 319],
            'project-single' => ['width' => 546, 'height' => 272],
            'home-project' => ['width' => 366, 'height' => 299],
            'home-blog' => ['width' => 364, 'height' => 219],
            'team' => ['width' => 165, 'height' => 165],
            'sidebar' => ['width' => 80, 'height' => 80],
            'review' => ['width' => 85, 'height' => 85],
            'footer-blog' => ['width' => 70, 'height' => 70],
        ];
        return  $size;
    }
}
if (!function_exists('get_image_size')) {
    function get_image_size($size)
    {
        if ($size) {
            $sizes  = image_sizes();
            if (array_key_exists($size, $sizes)) {
                return '-' . $sizes[$size]['width'] . 'x' . $sizes[$size]['height'];
            } else {
                return null;
            }
        }
    }
}
if (!function_exists('get_image')) {
    function get_image($id, $class = "", $size = "")
    {
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            }
        }
    }
}



if (!function_exists('get_banner')) {
    function get_banner($id, $class = "", $size = "")
    {
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            }
        } else {
            return '<img src="' . asset('frontend/assets/images/banner.jpg') . '" alt="Wonder Travel">';
        }
    }
}


if (!function_exists('get_media')) {
    function get_media($id)
    {
        if ($id) {
            return Media::where('id', $id)->first();
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_media_url')) {
    function get_media_url($id, $fb = '')
    {
        if ($id) {
            $media = Media::where('id', $id)->first();
            return $media ? $media->fullurl : Null;
        } else {
            return $fb ? $fb : Null;
        }
    }
}

if (!function_exists('get_gallery')) {
    function get_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = get_media($new);
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}



if (!function_exists('get_show_gallery')) {
    function get_show_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = $new;
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}



if (!function_exists('get_the_date')) {
    function get_the_date($data, $format = 'd M, Y')
    {
        if ($data) {
            return date($format, strtotime($data));
        }
    }
}


if (!function_exists('updatesettingmedia')) {
    function updatesettingmedia($request, $name, $filename)
    {
        $image = $request->file($name);
        if ($image) {
            $image_new_name = $filename . '-' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/setting/'), $image_new_name);

            $image = '/storage/setting/' . $image_new_name;
            return $image;
        } else {
            return null;
        }
    }
}
