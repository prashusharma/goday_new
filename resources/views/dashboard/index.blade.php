@extends('layouts.app')

@section("title", "Dashboard")

@section("action-btn")
  <a class="btn btn-outline-warning"  href="{{ route('dashboard.index') }}">Create Branch</a>
@endsection

@section('content')
    Working.....
@endsection