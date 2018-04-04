@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-auto mr-auto">
                <h2>Read Post</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('posts.index') }}" class="btn btn-primary"> Back</a>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $post->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    {{ $post->content }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Published On:</strong>
                    {{ $post->created_at }}
                </div>
            </div>
        </div>
    </div>
@endsection