<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = [];
	protected $fillable = [
		'name', 'body'
	];

    public  function  post()
    {
    	return $this->belongsToMany(Post::class);
    }
}
