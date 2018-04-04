@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('success_msg'))
                    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
                @endif
            <!-- Posts list -->
                @if(!empty($posts))
                    <div class="row">
                        <div class="col-auto mr-auto">
                            <h2>Posts List </h2>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-success " href="{{ route('posts.add') }}"> Add New</a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <table class="table table-striped task-table">
                                <!-- Table Headings -->
                                <thead>
                                <th width="20%">Title</th>
                                {{--<th width="30%">Content</th>--}}
                                <th width="10%">Created</th>
                                <th width="10%">Updated</th>
                                <th width="20%">Action</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{$post->title}}</div>
                                        </td>
                                        {{--<td class="table-text">--}}
                                            {{--<div>{{$post->content}}</div>--}}
                                        {{--</td>--}}
                                        <td class="table-text">
                                            <div>{{$post->created_at}}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{$post->updated_at}}</div>
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.details', $post->id) }}"
                                               class="btn btn-success">Details</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger"
                                               onclick="return confirm('Are you sure to delete?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection