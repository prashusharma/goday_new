@extends('layouts.app')

@section("title", "Create Staff")

@section("action-btn")
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('roles.create') }}">Create Roles</a>
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('department.index') }}">Manage Department</a>
@endsection

@section("css")
<style>
    

.select2-container .select2-selection--multiple {
    height: 40px !important;
}

.select2-container .select2-selection--multiple .select2-search__field{
    height: 100% !important;
}

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

<form action="{{ route('users.store') }}" class="" method="POST">
    @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="confirm-password" class="form-control">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Roles</label>
        <select name="role" class="form-control" id="dropdown" style="width: 100%"> 
            @foreach($roles as $key => $role)
                <option value="{{ $key }}">{{ $role }}</option>
            @endforeach
        </select>
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