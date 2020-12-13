@extends('layouts.app')

@section('content')
<div class="login-clean">
    <form method="POST" name="myform" action="{{ route('login') }}">
        @csrf
        <p> @include('inc.messages')</p>
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration">
            <h3 style="color: #56c6c6;">welearn</h3>
        </div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background: #56c6c6;">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a>
    </form>
</div>


@endsection