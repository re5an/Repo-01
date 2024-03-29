<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];

    protected  $fillable = ['title', 'body'];

	public function user( ) {
		return $this->belongsTo(User::class);
	}

	public function comments(  ) {
		return $this->hasMany(Comment::class);

	}
}
