@extends('layouts.app')

@section("title")
Create {{ auth()->user()->branch_label }}
@endsection

@section("action-btn")
  <a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('branch.index') }}">Back</a>
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

<form class="" action="{{ route('branch.store') }}" method="POST">
    @csrf
  <div class="row">
    
    <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} Name</label>
        <input type="text" name="branch_name" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} Code</label>
        <input type="text" name="branch_code" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
      <label class="m-0 mx-2 d-flex" style="align-items: center;">{{ auth()->user()->branch_label }} Opening Date</label>
        <input type="date" name="opening_date" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} Opening Fund</label>
        <input type="number" name="opening_fund" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} Email</label>
        <input type="email" name="email" class="form-control" autocomplete="off" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} Contact Number</label>
        <input type="number" name="contact_number invalid" id="contact_number" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} State</label>
        {{-- <input type="text" name="state" class="form-control" autocomplete="off" required> --}}
        <select name="state" id="state" class="form-control state" required style="width: 100%">
          <option value="not_selected" selected>Click to Select State</option>
          @foreach($data['state'] as $key => $statelist)
          <option value="{{ $statelist->state_id }}">{{ state($statelist->state_id) }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} City</label>
        <select name="city" id="city" class="form-control state" required style="width: 100%">
          {{-- <option value="not_selected" selected>Click to Select City</option> --}}
         
        </select>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">{{ auth()->user()->branch_label }} Area</label>
        <select name="area" id="area" class="form-control state" required style="width: 100%">
          {{-- <option value="not_selected" selected>Click to Select City</option> --}}
         
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
       
        <div id="pincode" style="width:100%">
        <input type="number" name="pincode" maxlength="6" minlength="6" class="form-control" autocomplete="off" required style="width:100%">
        </div>
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

<script>
  $("#state").select2({
    width: 'resolve',
    theme: "classic",
    placeholder: "Select State",
    allowClear: true
  });
</script>

<script>
  $("#city").select2({
    width: 'resolve',
    theme: "classic",
    placeholder: "Select City",
    allowClear: true
  });
</script>

<script>
  $("#area").select2({
    width: 'resolve',
    theme: "classic",
    placeholder: "Select Area",
    allowClear: true
  });
</script>


<script type=text/javascript>
  $('#state').on('change',function(){
   var stateID = $(this).val();

   
   if(stateID){
     $.ajax({
       type:"GET",
       url:"{{url('get-city-list')}}?state_id="+stateID,
       success:function(res){
       if(res){
         $("#city").empty();
           
         $.each(res,function(key,value){
           $("#city").append('<option value="'+value.id+'">'+value.city+'</option>');
         });
 
       }else{
         $("#city").empty();
       }
       }
     });
   }else{
     $("#city").empty();
     $("#area").empty();
   }
 
   });
 
   $('#city').on('change',function(){
   var cityID = $(this).val();
   if(cityID){
     $.ajax({
       type:"GET",
       url:"{{url('get-area-list')}}?city_id="+cityID,
       success:function(res){
       if(res){
         $("#area").empty();
         $.each(res,function(key,value){
             $("#area").append('<option value="'+value.id+'">'+value.area+'</option>');
        
         });
 
       }else{
         $("#area").empty();
       }
       }
     });
   }else{
     $("#area").empty();
   }
 
   });

   $('#area').on('change',function(){
   var areaID = $(this).val();
   if(areaID){
     $.ajax({
       type:"GET",
       url:"{{url('get-pincode')}}?area_id="+areaID,
       success:function(res){
       if(res){
         $("#pincode").empty();
         $.each(res,function(key,value){
            //  $("#area").append('<option value="'+value.id+'">'+value.area+'</option>');
           $("#pincode").append(' <input type="number" name="pincode" maxlength="6" minlength="6" class="form-control" value="'+value.pincode+'" style="width:100%">');
         });
 
       }else{
         $("#pincode").empty();
       }
       }
     });
   }else{
     $("#pincode").empty();
   }
 
   });
 
 
 
 </script>


@endsection