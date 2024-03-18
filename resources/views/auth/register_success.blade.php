@extends('auth.layout.app')

@section('title', 'Register')

@section('main_content')
    <p>You have successfully registered, please go to the login page to access!</p>
    <a href="{{ route('login') }}">Click here to return login page</a>
@endsection