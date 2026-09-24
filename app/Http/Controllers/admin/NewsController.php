<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'news');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $news =  News::create($input);
        $news->update(['slug' => $slug]);
        return redirect()->route('news.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $old_image = $news->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'news');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = make_slug($request->name);
        $news->update($input);
        return redirect()->route('news.edit', $news->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        removeFile($news->image);
        $news->delete();
        return redirect()->route('news.index')->with('message', 'Delete Successfully');
    }

    public function like($id)
    {
        $news = News::findOrFail($id);

        // Get liked news from session (array or empty)
        $liked = session()->get('liked_news', []);

        // Already liked?
        if (in_array($id, $liked)) {
            return response()->json([
                'message' => 'Already liked',
                'likes' => $news->likes
            ]);
        }

        // Increment likes
        $news->increment('likes');

        // Store liked post ID in session
        session()->push('liked_news', $id);

        return response()->json([
            'message' => 'Liked!',
            'likes' => $news->likes
        ]);
    }
    public function searchAjax(Request $request)
    {
        $query = $request->input('q');

        // If empty input, return blank
        if (!$query) {
            return response()->json(['html' => '']);
        }

        $news = \App\Models\News::where('status', 1)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->latest()
            ->get();

        // Render the same partial you use for cards
        $html = view('frontend.news.partials.news_list', compact('news'))->render();

        return response()->json(['html' => $html]);
    }







}
