@extends('admin.authMaster')
@section('title')
    Login
@endsection
@section('authMainContent')
    <h4>New here?</h4>
    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="name" required autofocus>
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
        </div>
        <div class="text-center mt-4 font-weight-light">
            Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
        </div>
    </form>
@endsection
