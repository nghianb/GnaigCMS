@extends('dashboard::layouts.dashboard')

@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-3 order-lg-1">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Publish</h3>
                    </div>
                    <div class="card-body row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </div>
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <button type="submit" name="continue" value="true" class="btn btn-primary w-100">Save & Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mb-3 mb-lg-0">
                    <div class="card-header">
                        <h3 class="card-title">Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="firstname">Firstname</label>
                                <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                    class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}">
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $errors->first('firstname') }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"
                                   class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}">
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                               class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="password"
                               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Password confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
