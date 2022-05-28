<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends AdminController
{
    public function index()
    {


        $articles = Article::latest('created_at')->paginate(9);
        return view('admin.articles.index',compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {

        $imagesUrl = $this->uploadImages($request->file('images'));
        $article=auth()->user()->articles()->create(array_merge($request->all() , [ 'images' => $imagesUrl]));
        $article->categories()->sync($request['categories']);
        $article->tags()->sync($request['tags']);

        return redirect(route('articles.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit' , compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $file = $request->file('images');
        $inputs = $request->all();

        if($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));

            foreach($article->images['images'] as $key => $image){
                if(File::exists(public_path($image)))
                    File::delete(public_path($image));
            }


        } else {
            $inputs['images'] = $article->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];


        }

        unset($inputs['imagesThumb']);
        $article->slug = null;
        $article->update($inputs);
        $article->categories()->sync($request['categories']);
        $article->tags()->sync($request['tags']);

        return redirect(route('articles.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Article $article)
    {
        foreach($article->images['images'] as $key => $image){
            if(File::exists(public_path($image)))
                File::delete(public_path($image));
        }
        $article->delete();
        return redirect(route('articles.index'));
    }

}
