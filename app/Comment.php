<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function blog(){
       return $this->belongsTo('App\Blog');
    }

    function scopeGetAllComments($query){
        return $query->withTrashed()->orderBy('created_at',
            'desc')->get();
    }

}
