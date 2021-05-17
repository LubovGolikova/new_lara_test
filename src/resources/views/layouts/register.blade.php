@extends('layouts.app')
@section('content')

<main class="main-container">
    <div class="register-container">
        <form role="form" method="post">
            <div class="register-text text-left">
                <label>Username</label>
            </div>
            <div class="form-group row">
                <div class="col ">
                    <input id="username" type="text" class="form-control" name="username" value="">
                </div>
            </div>
            <div class="register-text text-left">
                <label>Email</label>
            </div>
            <div class="form-group row">
                <div class="col ">
                    <input id="email" type="text" class="form-control" name="email" value="">
                </div>
            </div>
            <div class="register-text text-left">
                <label>Photo</label>
            </div>
            <div class="form-group row">
                <div class="col ">
                    <input id="avatar-path" type="file" class="form-control" name="avatar_path" value="">
                </div>
            </div>
            <div class="register-text text-left">
                <label>Password</label>
            </div>
            <div class="form-group row">
                <div class="col ">
                    <input id="password" type="text" class="form-control" name="password" value="">
                </div>
            </div>
            <div class="register-text text-left">
                <label>Confirm password</label>
            </div>
            <div class="form-group row">
                <div class="col ">
                    <input id="password-confirmation" type="text" class="form-control" name="password_confirmation" value="">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col">
                    <button id="register-form-submit" type="submit" class="btn btn-primary  w-100">
                        Sign up
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection


