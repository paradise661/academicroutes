<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.setting.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        // dd($request);
        $siteSettings = Setting::pluck('value', 'key');

        $siteSetting = $request->all();


        // $site_main_logo = updatesettingmedia($request, 'site_main_logo', 'main_logo');
        // $site_footer_logo = updatesettingmedia($request, 'site_footer_logo', 'footer_logo');
        // $site_fav_icon = updatesettingmedia($request, 'site_fav_icon', 'fav_logo');
        // $homepage_image = updatesettingmedia($request, 'homepage_image', 'homepage_image');
        // $abt_image1 = updatesettingmedia($request, 'abt_image1', 'abt_image1');
        // $abt_image2 = updatesettingmedia($request, 'abt_image2', 'abt_image2');
        // $faq_image = updatesettingmedia($request, 'faq_image', 'faq_image');
        // $page_img = updatesettingmedia($request, 'page_img', 'page_img');
        $site_main_logo = fileUpload($request, 'site_main_logo', 'main_logo');
        $site_footer_logo = fileUpload($request, 'site_footer_logo', 'footer_logo');
        $site_fav_icon = fileUpload($request, 'site_fav_icon', 'fav_logo');
        $homepage_image = fileUpload($request, 'homepage_image', 'homepage_image');
        $abt_image1 = fileUpload($request, 'abt_image1', 'abt_image1');
        $abt_image2 = fileUpload($request, 'abt_image2', 'abt_image2');
        $faq_image = fileUpload($request, 'faq_image', 'faq_image');
        $page_img = fileUpload($request, 'page_img', 'page_img');

        $siteSetting['site_main_logo'] = deletesettingmedia($site_main_logo, $siteSettings['site_main_logo'], 'site_main_logo', $siteSetting, $siteSettings);
        $siteSetting['site_footer_logo'] = deletesettingmedia($site_footer_logo, $siteSettings['site_footer_logo'], 'site_footer_logo', $siteSetting, $siteSettings);
        $siteSetting['site_fav_icon'] = deletesettingmedia($site_fav_icon, $siteSettings['site_fav_icon'], 'site_fav_icon', $siteSetting, $siteSettings);
        $siteSetting['homepage_image'] = deletesettingmedia($homepage_image, $siteSettings['homepage_image'], 'homepage_image', $siteSetting, $siteSettings);
        $siteSetting['abt_image1'] = deletesettingmedia($abt_image1, $siteSettings['abt_image1'], 'abt_image1', $siteSetting, $siteSettings);
        $siteSetting['abt_image2'] = deletesettingmedia($abt_image2, $siteSettings['abt_image2'], 'abt_image2', $siteSetting, $siteSettings);
        $siteSetting['faq_image'] = deletesettingmedia($faq_image, $siteSettings['faq_image'], 'faq_image', $siteSetting, $siteSettings);
        $siteSetting['page_img'] = deletesettingmedia($page_img, $siteSettings['page_img'], 'page_img', $siteSetting, $siteSettings);




        foreach ($siteSetting as $key => $value) {
            $setting->updateOrCreate(['key' => $key,], [
                'key' => $key,
                'value' => $value,
            ]);
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }
}
