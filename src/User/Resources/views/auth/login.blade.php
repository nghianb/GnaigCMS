@extends('dashboard::layouts.master')

@section('page')
    <div class="page page-center">
        <div class="container-tight py-4">
            <h1 class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">{{ config('app.name') }}</a>
            </h1>
            <form class="card card-md" action="{{ route('login.login') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login to your account</h2>
                    <div class="mb-3">
                        <label class="form-label" for="account">Account</label>
                        <input type="text" name="account" id="account" value="{{ old('account') }}"
                            class="form-control {{ $errors->has('account') ? 'is-invalid' : '' }}">
                        @error('account')
                        <div class="invalid-feedback">{{ $errors->first('account') }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" name="remember" value="1" class="form-check-input"/>
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
