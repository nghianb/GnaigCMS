@extends('dashboard::layouts.dashboard')

@section('content')
    @include('dashboard::components.table-view', ['tableView' => $tableView])
@endsection
