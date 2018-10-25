<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/18/18
 * Time: 8:48 PM
 */

namespace App\Http\Controllers\Api;


use App\Blog;
use App\Blogs\Repositories\BlogRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        //$this->middleware('auth');
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(100);
        return response()->json($blogs);

    }

    public function search(Request $search)
    {

        $blogs = Blog::filterByDate($search['search'])->orderBy('created_at', 'desc')->paginate(10);
        return response()->json($blogs);
    }


    public function create()
    {
        return view('blogs.create');
        //
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);


        $blog = Blog::create($request->all());

        return response()->json($blog);

    }


    public function show($id)
    {
        $blog = $this->blogRepository->show($id);
        return response()->json($blog);
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {


    }



    public function destroy($id)
    {

    }
}