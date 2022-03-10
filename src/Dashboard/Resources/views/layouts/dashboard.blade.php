@extends('dashboard::layouts.master')

@section('page')
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    @include('dashboard::partials.logo')
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="d-none d-lg-flex">
                        @include('dashboard::partials.theme-switch')
{{--                        @include('dashboard::partials.notification')--}}
                    </div>
                    <div class="nav-item dropdown">
                        @include('dashboard::partials.mini-profile')
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    @include('dashboard::partials.navbar-menu')
                </div>
            </div>
        </aside>
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex me-3">
                        @include('dashboard::partials.theme-switch')
{{--                        @include('dashboard::partials.notification')--}}
                    </div>
                    <div class="nav-item dropdown">
                        @include('dashboard::partials.mini-profile')
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
{{--                    @include('dashboard::partials.search-form')--}}
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="container-fluid">
                @include('dashboard::partials.page-header')
            </div>
            <div class="page-body">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('dashboard::partials.toast')
@endsection
