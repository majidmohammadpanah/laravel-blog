<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function articles(Category $category)
    {
        SEOMeta::setTitle($category->title);
        SEOMeta::setCanonical(url()->full());
        OpenGraph::setTitle($category->title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'WebPage');
        OpenGraph::addProperty('locale', 'en');
        OpenGraph::addProperty('locale:alternate', 'en-us');
        TwitterCard::setTitle($category->title);
        TwitterCard::setType("WebPage");
        JsonLd::setTitle($category->title);
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->full());

        $tags = Tag::latest()->take(20)->get();
        $categories = Category::latest()->take(20)->get();
        $articles = $category->articles()->paginate(9);
        return view('articles',compact('articles','tags','categories'));
    }
}
