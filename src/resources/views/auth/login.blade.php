@extends('layouts.main')

@section('main-content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                               @endif
                                @if(Session::has('fail'))
                                 <div class="alert alert-danger">{{Session::get('fail')}}</div>
                               @endif
                                <input type="email" placeholder="Email" id="email" class="form-control" name="email" value="{{old('email')}}">
                                
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>    
                                
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                                
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>    
                                
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection