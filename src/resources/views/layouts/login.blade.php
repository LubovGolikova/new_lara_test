@extends('app')
@section('content')

<main class="main-container-login">
    <div class="login-container ">
        <form  role="form" action="/login" id="login-form" method="post" name="loginForm">
            @csrf
            <div class="login-text text-left">
                <label>Email</label>
            </div>
            <div class="form-group row">
                <div class="col">
                    <input id="email" type="text" class="form-control" name="email" value="">
                </div>
            </div>
            <div class="login-text text-left">
                <label>Password</label>
            </div>
            <div class="form-group row">
                <div class="col">
                    <input id="password" type="text" class="form-control" name="password" value="">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col">
                    <button id="login-form-submit" type="submit" class="btn btn-primary  w-100">
                        Log in
                    </button>
                </div>
            </div>
            <p id="login-error-msg">Invalid email <span id="error-msg-second-line">and/or password</span></p>
        </form>
    </div>
<div id="result"></div>
</main>
@endsection
