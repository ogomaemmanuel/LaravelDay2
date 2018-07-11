@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{$blog->title}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{$blog->body}}
            </div>
            <div class="">
{{--                Created by: {{$blog->user()->id?}}--}}

            </div>

        </div>

        {{ Form::open(['route' => ['comments.store', $blog->id], 'method' => 'POST']) }}

        <div class="row">

            <div class="col-md-12">
                {{ Form::label('comment', "Comment:") }}
                {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) }}

                {{ Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:15px;']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>


@endsection
