<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $table = 'posts';

    protected $fillable = [
    	'title', 'thumbnail', 'description','content','user_id','category_id', 'status','slug',
    ];

    public function category() {
    	return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function tags() {
    	return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id')->withTimestamps();
    }

    public function user() {
    	return $this->beLongsTo('App\User');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }
}
