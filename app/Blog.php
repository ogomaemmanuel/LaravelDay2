<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];


    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function scopeFilterByDate($query, $date = null)
    {

        if ($date) {
            return $query->where('created_at', $date);
        }
        return $query;

    }
}
