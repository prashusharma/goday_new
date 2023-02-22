@extends('layouts.app')


@section("title")
Create {{ auth()->user()->group_label }}
@endsection

@section("action-btn")
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('group.show',$id) }}">Back</a>
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

<form class="" action="{{ route('group.store') }}" method="POST">
    @csrf
  <div class="row">
    <input type="hidden" name="branch_id" value="{{ $id }}">
    <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
        <label class="form-label">{{ auth()->user()->group_label }} Name</label>
        <input type="text" name="group_name" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
        <label class="form-label">{{ auth()->user()->group_label }} Code</label>
        <input type="text" name="group_code" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
      <label class="m-0 mx-2 d-flex" style="align-items: center;">{{ auth()->user()->group_label }} Opening date</label>
        <input type="date" name="group_opening_date" class="form-control" autocomplete="off" required>
      </div>
    </div>
    @php
        $state_name = '';
        $city_name = '';
        $branch_fund = 0;
        getStateCityFund($state_name, $city_name, $branch_fund, $id);
      @endphp
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3  {{ $branch_fund ? 'is-filled' : '' }}">
        <label class="form-label">{{ auth()->user()->branch_label }} Available Fund</label>
        <input type="number" name="group_opening_fund" value="{{ $branch_fund }}" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
        <label class="form-label">{{ auth()->user()->group_label }} Email</label>
        <input type="email" name="group_email" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
        <label class="form-label">{{ auth()->user()->group_label }} Contact Number</label>
        <input type="number" name="group_contact_number" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      
      <div class="input-group input-group-outline my-3 {{ $state_name ? 'is-filled' : '' }}">
        <label class="form-label">{{ auth()->user()->group_label }} State</label>
        <input type="text" name="state" value="{{ $state_name }}" class="form-control" autocomplete="off" required disabled>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 {{ $city_name ? 'is-filled' : '' }} ">
        <label class="form-label">{{ auth()->user()->group_label }} City</label>
        <input type="text" name="city" value="{{ $city_name }}" class="form-control" autocomplete="off" required disabled>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
        <label class="form-label">{{ auth()->user()->group_label }} Area</label>
        <input type="text" name="area" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3 ">
        <label class="form-label">Pincode</label>
        <input type="number" name="pincode" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 


  <div class="row">
    
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3 ">
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