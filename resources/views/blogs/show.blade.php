@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            {{$blog->title}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{$blog->body}}
        </div>

    </div>
@endsection
