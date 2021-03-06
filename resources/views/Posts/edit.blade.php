@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach()
                    </div>
                @endif

                <div class="row">
                    <div class="col-auto mr-auto">
                        <h2>Edit Post</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary"> Back</a>
                    </div>

                </div>

                <div class="col">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" id="title" class="form-control"
                                               value="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Content</label>
                                    <div class="col-sm-10">
                                    <textarea name="content" id="content"
                                              class="form-control">{{ $post->content }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success" value="Update Post"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection