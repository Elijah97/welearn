@extends('layouts.app')

@section('content')
<!-- Masthead -->
@include('inc.messages')

<div class="highlight-blue" style="background: #c4d5ef;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background: #465765;">
        <div class="container"><a class="navbar-brand" href="#" style="color: #56c6c6;">welearn</a><a href="dashboard.html" style="color: #56c6c6;">Home</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="/signup">Sign Up</a>
            </div>
        </div>
    </nav>
    <div class="container" style="width: 500px;margin-top: 200px;">
        <div class="intro">
            <h2 class="text-center" style="color: #56c6c6;">Welcome to welearn</h2>
            <p class="text-center" style="color: #ffffff;">The e-learning platform builds for you to learn everywhere in the world</p>
        </div>
        <div class="buttons"><a class="btn btn-primary" role="button" style="color: #56c6c6;" href="/signup">Sign Up</a></div>
        <div class="buttons"><a class="btn btn-primary" role="button" style="color: #56c6c6;" href="/login">Login</a></div>
    </div>
</div>



@endsection