<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body'];


    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = strtoupper($value);
    }

    public function scopeFilterByDate($query,$date = null){

        if($date){
            return $query->where('created_at', $date);
        }
        return $query;

    }
}
