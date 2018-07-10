<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Mail\BlogObserverMail;
use App\Repositories\BlogRepository;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Blogs\Repositories\BlogRepositoryInterface;

use App\Repositories;
use Illuminate\Support\Facades\Mail;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //use Notifiable;

    public $blogRepository;

    public  function __construct(BlogRepository $blogRepository)
    {
        $this->middleware('auth');
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = Blog::orderBy('created_at','desc')->paginate(10);
        //dd($blogs);

        return view('blogs.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = $this->blogRepository->save($request);


        $users= User::all();

       //Mail::to($users)->queue(new BlogObserverMail($blog));

        return redirect('blog')->with('success', 'Blog Created');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogRepository->show($id);
        //dd($blog);
        return view('blogs.show')->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = new Blog();
        $blog = Post::find($id);
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->save();
        return redirect('/index')->with('success', 'Blog Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
