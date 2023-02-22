@extends('layouts.app')

@section("title", "Create Admin")

@section("action-btn")
<a class="btn btn-outline-warning rounded-0 btn-sm" href="{{ route('admin-setting.index') }}">Back</a>
@endsection

@section("css")
<style>
</style>
@endsection

@section('content')

<!-- @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif -->

<form action="{{ route('users.store') }}" class="" method="POST">
  @csrf
  <div class="row">
    <input type="hidden" name="role" value="admin">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Business / Company Name</label>
        <input type="text" name="business_name" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Contact Person</label>
        <input type="text" name="contact_person" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Email </label>
        <input type="email" name="email" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Contact No</label>
        <input type="number" name="contact_number" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Website </label>
        <input type="text" name="website" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <!-- <label class="form-label">Logo</label> -->
        <label class="m-0 mx-2 d-flex" style="align-items: center;">Select the logo</label>
        <input type="file" name="logo" class="form-control" autocomplete="off">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">State </label>
        <input type="text" name="state" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Username </label>
        <input type="text" name="username" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <button class="btn btn-outline-danger rounded-0 w-100" type="submit">Submit</button>
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