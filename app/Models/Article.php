<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Article extends Model implements Feedable
{
    use HasFactory;
    protected $fillable = ['user_id','title','slug','description','body','images','viewCount'];

    use Sluggable;



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $casts = [
        'images' => 'array'
    ];
    public function path()
    {
        return "/article/$this->slug";
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //----- Feed ------
    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->slug)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link($this->path())
            ->authorName($this->user->name);
    }
    public static function getAllFeedItems()
    {
        return Article::latest()->take(150)->get();
    }
}
