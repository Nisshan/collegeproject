@extends('adminlte::page')
@section('title', 'Create Users')

@section('content')
    @include('flash::message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">{{__('lang.Create_Users')}}</h1>
                    </div>
                    <div class="box-header with-border">
                        <form action="{{ route('users.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="title">{{__('lang.User_Name')}}</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('lang.Email_address')}}</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('lang.Create_password')}}</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('lang.Confirm_password')}}</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">{{__('lang.Submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($errors))
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
