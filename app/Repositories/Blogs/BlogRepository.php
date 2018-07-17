<?php

namespace App\Repositories;


use App\Blogs\Repositories\BlogRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogObserverMail;
class BlogRepository implements BlogRepositoryInterface
{

    public $post;
    private $model;
    public function __construct()
    {

    }

    public function all()
    {
       return Blog::all();
    }

    public function save(array $request)
    {
        $blog = new Blog();
        $blog->title = $request['title'];
        $blog->body = $request['body'];
        $blog->user_id = auth()->id();
       return $blog->save();

    }

    public function update( array $request,$id)
    {
        $record=  Blog::find($id);
        return $record->update($request->all());
    }

    public function delete($id)
    {
        //return $this->model->destroy($id);
    }

    public function show($id)
    {
       $blog= Blog::with('comments')->find($id);
        return $blog;
    }
}