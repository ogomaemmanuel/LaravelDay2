<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogObserverMail;
class BlogRepository implements BlogRepositoryInterface
{

    public $post;

    public function __construct()
    {
       // $this->model = $model;
    }

    public function all()
    {
        $this->model->all();
    }

    public function save($request)
    {
        $blog = new Blog();
        $blog->title = $request['title'];
        $blog->body = $request['body'];
        $blog->user_id = auth()->id();
       return $blog->save();

    }

    public function update($id, $request)
    {
        $record = $this->find($id);
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

    // Get the associated model
    public function getModel()
    {
        //return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
}