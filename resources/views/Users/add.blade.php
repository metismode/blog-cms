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
                            <h2>Add a New User</h2>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('users.index') }}" class="btn btn-primary"> Back</a>
                        </div>

                    </div>
                <div class="col">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="{{ route('users.insert') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Password</label>
                                    <div class="col-sm-10">
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2">Role</label>
                                    <div class="col-sm-10">
                                        <select id="role" name="role" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success" value="Add User"/>
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