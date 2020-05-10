<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'thumbnail', 'youtube_link', 'category_id', 'online'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function scopePublished($query){
        return $query->where('online', true);
    }

}
