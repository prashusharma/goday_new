@extends('layouts.app')

@section("title", "Location Management-(City List)")

@section("body-class", "g-sidenav-show bg-gray-200")


@section("action-btn")
<a class="btn btn-outline-warning rounded-0 btn-sm"  href="{{ route('location-master.index') }}">Back</a>
<button type="button" class="btn btn-outline-warning btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add City
</button>
@endsection

@section('content')  
<div class="px-2 table-responsive">
  @php
    $i = 1;
  @endphp
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>City</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data['city'] as $citylist)
      <tr class="align-middle">
        <td class="text-center fw-bold">
            {{ $i++ }}
        </td>
        <td>
            {{ $citylist->city }}
        </td>
       
        <td class="">

          @php
            $data['areacount'] = DB::table('area')->where('city_id',$citylist->id)->count();
          @endphp

         <a href="{{ route('area_list',['stateid'=>$stateid,'cityid'=>$citylist->id]) }}" style="color:blue"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
          </svg>&nbsp View Area ( {{ $data['areacount'] }} )</a>
          
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('store_city') }}">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="state_id" value="{{ $stateid }}">
        <label>Create City</label>
        <input type="text" class="form-control" name="city" style="border:1px solid black">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



@endsection

@section("js")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/Gruntfile.min.js"></script> -->
<script>
  $("#state").select2({
    width: 'resolve',
    theme: "classic",
    placeholder: "Select State",
    allowClear: true
  });
</script>
@endsection
