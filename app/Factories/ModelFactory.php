<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/19/18
 * Time: 9:00 AM
 */

namespace App\Factories;


use App\Blog;
use App\Comment;
use App\User;

class ModelFactory
{




    public  function makeModel($model)
    {
        switch ($model) {
            case 'user':
                return new User();
            case "comment":
                return new Comment();
            case 'blog':
                return new Blog();
        }

    }
}

