@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-auto mr-auto">
                <h2>Read User</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('users.index') }}" class="btn btn-primary"> Back</a>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Published On:</strong>
                    {{ $user->created_at }}
                </div>
            </div>
        </div>
    </div>
@endsection