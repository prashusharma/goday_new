@extends('layouts.app')

@section("title", "Create Department")

@section("action-btn")
<a class="btn btn-outline-warning rounded-0 btn-sm mx-5" href="">Back</a>
@endsection

@section("css")
<style>
</style>
@endsection

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('department.store') }}" method="POST">
  @csrf
  <div class="column">
    <input type="hidden" name="company_id" value="{{auth()->user()->id}}">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3" required>
        <label class="form-label">Enter Department name</label>
        <input type="text" name="department" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <button class="btn btn-outline-danger rounded w-100" type="submit">Submit</button>
      </div>
    </div>
  </div>
</form>
@endsection

@section("js")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/Gruntfile.min.js"></script> -->
<script>
  $("#dropdown").select2({
    width: 'resolve',
    theme: "classic",
    placeholder: "Select role",
    allowClear: true
  });
</script>
@endsection