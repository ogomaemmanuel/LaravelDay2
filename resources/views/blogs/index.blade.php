@extends('layouts.app')
@section('content')

    <div class="container">

        <div>
            <a href="/blog/create" class="btn btn-primary">Create New Blog</a>
        </div>
        <h1>Blogs</h1>

        {!! Form::open(['action' => 'BlogController@search', 'method' => 'Get']) !!}
        <div class="form-group">

            <div class="row">
                <div class="col-md-4 ol-lg-4">
                    {{Form::date('search', '', ['class' => 'form-control', 'type'=>'date', 'placeholder' => 'search'])}}
                </div>
                <div class="col-md-4 ol-lg-4">
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                </div>
            </div>



        </div>

        {!! Form::close() !!}

        @if(count($blogs) > 0)
            <div class="row">
            @foreach($blogs as $blog)


    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                 src="https://ionicframework.com/dist/preview-app/www/assets/img/nin-live.png"
                 alt="Card image cap">
            <div class="card-body">
                <h4>{{$blog->title}}</h4>
                <p class="card-text">{{$blog->body}}</p>
                <a href='{!! route('blog.show', $blog->id) !!}'class="btn btn-primary">View</a>
            </div>
        </div>
    </div>





            @endforeach
            </div>

        @else
            <p>No posts found</p>

    @endif
@endsection