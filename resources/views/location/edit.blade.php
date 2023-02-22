@extends('layouts.app')

@section("title", "Create Location")

@section("action-btn")
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="">Back</a>
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

<form class="" action="" method="POST">
    @csrf
  <div class="row">
    <input type="hidden" name="branch_id" value="{{ $id }}">
    <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group Name</label>
        <input type="text" name="group_name" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group Code</label>
        <input type="text" name="group_code" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <!-- <label class="form-label">Branch Opening date</label> -->
        <input type="date" name="group_opening_date" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Opening Fund</label>
        <input type="number" name="group_opening_fund" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group Email</label>
        <input type="email" name="group_email" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group Contact Number</label>
        <input type="number" name="group_contact_number" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group State</label>
        <input type="text" name="state" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group City</label>
        <input type="text" name="city" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Group Area</label>
        <input type="text" name="area" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Pincode</label>
        <input type="number" name="pincode" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 

  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Branch Address</label>
        <input type="text" name="address" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Pincode</label>
        <input type="text" name="code" class="form-control" autocomplete="off">
      </div>
    </div>
  </div> 

  <div class="row">
    
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