<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/10/18
 * Time: 11:59 PM
 */


namespace App\Repositories;
use App\Blog;
use App\Comment;

class  CommentsRepository{

    private $model;
    public function __construct(Comment $comment)
    {
$this->model=$comment;
    }
    function create($request, $blog_id){
       //$blog= Blog::find($blog_id);
        $comment = new Comment();
        $comment->body= $request->body;
        $comment->user_id=auth()->id();
        $comment->blog_id=$blog_id;
        //$comment->associate($blog);
        $comment->save();

    }

    function getAll(){

    }
}