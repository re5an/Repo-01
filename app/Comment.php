<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = [];
	protected $fillable = [
		'name', 'body' , 'post_id'
	];

    public  function  post()
    {
    	return $this->belongsToMany(Post::class);
    }
}
