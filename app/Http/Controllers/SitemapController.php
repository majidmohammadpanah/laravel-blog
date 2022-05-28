<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    //
    public function index()
    {

        $sitemap=SitemapIndex::create()
            ->add('/sitemap-articles')
            ->writeToFile(public_path('sitemap.xml'));
        return $sitemap->toResponse(public_path('sitemap.xml'));

    }

    public function articles()
    {
        $sitemap=Sitemap::create();
        $articles = Article::latest()->get();
        foreach ($articles as $article) {
            $sitemap->add(Url::create("/article/{$article->slug}")->setLastModificationDate(Carbon::create($article->created_at))->setPriority(0.9)->setChangeFrequency('monthly'));
        }
        $sitemap->writeToFile(public_path('sitemap-articles.xml'));
        return $sitemap->toResponse(public_path('sitemap-articles.xml'));



    }
}
