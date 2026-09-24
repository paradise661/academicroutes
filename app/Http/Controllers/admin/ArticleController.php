<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::latest()->paginate(10);
        return view('admin.article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $input = $request->all();
        $input['image'] = fileUpload($request, 'image', 'article');
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $article =  Article::create($input);
        $article->update(['slug' => $slug]);
        return redirect()->route('article.index')->with('message', 'Created Successfully');
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
    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $old_image = $article->image;
        $input = $request->all();
        $image = fileUpload($request, 'image', 'article');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $input['slug'] = make_slug($request->name);
        $article->update($input);
        return redirect()->route('article.edit', $article->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        removeFile($article->image);
        $article->delete();
        return redirect()->route('article.index')->with('message', 'Delete Successfully');
    }
}
