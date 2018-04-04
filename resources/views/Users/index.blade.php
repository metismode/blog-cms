@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('success_msg'))
                    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
                @endif
            <!-- Posts list -->
                @if(!empty($users))
                    <div class="row">
                        <div class="col-auto mr-auto">
                            <h2>Users List </h2>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-success " href="{{ route('users.add') }}"> Add New</a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <table class="table table-striped task-table">
                                <!-- Table Headings -->
                                <thead>
                                <th width="20%">Name</th>
                                <th width="30%">Email</th>
                                <th width="10%">Role</th>
                                {{--<th width="10%">Created</th>--}}
                                <th width="10%">Updated</th>
                                <th width="20%">Action</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{$user->name}}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{$user->email}}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{$user->rolename}}</div>
                                        </td>
                                        {{--<td class="table-text">--}}
                                            {{--<div>{{$user->created_at}}</div>--}}
                                        {{--</td>--}}
                                        <td class="table-text">
                                            <div>{{$user->updated_at}}</div>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.details', $user->id) }}"
                                               class="btn btn-success">Details</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger"
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