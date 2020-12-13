@extends('layouts.app')

@section('content')
<div class="register-photo">
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="text-center" style="color: #56c6c6;"><strong>welearn</strong></h2>
            <div class="form-group">
                <label for="password" class="col-md-12 col-form-label">Names</label>
                <input class="form-control" type="text" name="name" placeholder="Your name" required=""></div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label for="password" class="col-md-12 col-form-label">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email"></div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label for="password" class="col-md-12 col-form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="99">Teacher</option>
                    <option value="1">Student</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-12 col-form-label">Course</label>
                <select name="course" class="form-control">
                    <option value="Human Centerd Design">Human Centerd Design</option>
                    <option value="Computing Research">Computing Research</option>
                    <option value="Advanced Algorithm">Advanced Algorithm</option>
                    <option value="Security">Security</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-12 col-form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-12 col-form-label">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password"></div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" required>I agree to the license terms.</label></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block btn-sm" type="submit" style="background: #56c6c6;">Sign Up</button></div><a class="already" href="/login">You already have an account? Login here.</a>
        </form>
    </div>
</div>
@endsection