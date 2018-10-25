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
     * /Users/eogoma/projects/blog/app
     * @return \Illuminate\Http\Response
     */
    //use Notifiable;

    public $blogRepository;

    public  function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->middleware('auth');
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = Blog::orderBy('created_at','desc')->paginate(10);
        return view('blogs.index')->with('blogs', $blogs);
    }
    public function search(Request $search)
    {

        $blogs = Blog::filterByDate($search['search'])->orderBy('created_at','desc')->paginate(10);


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
        $this->validate($request,[
            'body'=>'required'
        ]);
        $blog = $this->blogRepository->save($request);
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

       // return redirect('/index')->with('success', 'Blog Updated');
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
