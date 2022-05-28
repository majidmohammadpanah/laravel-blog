<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;


class ArticleController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle("Blog");
        SEOMeta::setDescription("Top Programming Articles");
        SEOMeta::addKeyword("learn php,learn laravel,php,laravel,web design,web development,programming articles,web articles,top programming articles,blog,programming blog");
        SEOMeta::setCanonical(url()->full());
        OpenGraph::setDescription("Top Programming Articles");
        OpenGraph::setTitle("Blog");
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en');
        OpenGraph::addProperty('locale:alternate', 'en-us');
        TwitterCard::setTitle("Blog");
        TwitterCard::setDescription("Top Programming Articles");
        JsonLd::setTitle("Blog");
        JsonLd::setDescription("Top Programming Articles");
        JsonLd::setType('Article');
        JsonLd::setUrl(url()->full());


        $articles = Article::latest('created_at')->paginate(9);
        $tags = Tag::latest()->take(20)->get();
        $categories = Category::latest()->take(20)->get();
        return view('articles',compact('articles','tags','categories'));
    }

    public function single(Article $article)
    {
        $tags="";
        foreach($article->tags as $tag)  $tags.=$tag['title'].",";
        $tags=substr($tags,0,-1);
        $categories="";
        foreach($article->categories as $category)  $categories.=$category['title'].",";
        $categories=substr($categories,0,-1);
        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->description);
        SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $categories, 'property');
        SEOMeta::addKeyword($tags);
        SEOMeta::setCanonical(url($article->path()));
        OpenGraph::setDescription($article->description);
        OpenGraph::setTitle($article->title);
        OpenGraph::setUrl(url($article->path()));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en');
        OpenGraph::addProperty('locale:alternate', 'en-us');
        OpenGraph::addImage(url($article->images['images']['original']));
        OpenGraph::setArticle([
            'published_time' => $article->created_at->toW3CString(),
            'modified_time' => $article->updated_at->toW3CString(),
            'author' => $article->user->name,
            'section' => 'articles',
            'tag' => $tags
        ]);
        TwitterCard::setTitle($article->title);
        TwitterCard::setDescription($article->description);
        TwitterCard::setImage(url($article->images['images']['original']));
        TwitterCard::setType("Article");
        JsonLd::setTitle($article->title);
        JsonLd::setDescription($article->description);
        JsonLd::setType('Article');
        JsonLd::setUrl(url($article->path()));
        JsonLd::addImage(url($article->images['images']['original']));

        $article->increment('viewCount');
        $articles = $article->latest()->take(5)->get();
        return view('single-article' , compact('article','articles'));
    }
}
