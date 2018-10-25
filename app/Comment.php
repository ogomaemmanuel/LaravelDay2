<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable=['body','blog_id'];

   public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }

    function scopeGetAllComments($query)
    {
        return $query->withTrashed()->orderBy('created_at',
            'desc')->get();
    }
}
