@extends('layouts.app')

@section("title", "Location Management-(State List)")

@section("body-class", "g-sidenav-show bg-gray-200")


@section("action-btn")
<button type="button" class="btn btn-outline-warning btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add State
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
        <th>State</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data['selected_state'] as $selected_state)
      <tr class="align-middle">
        <td class="text-center fw-bold">
            {{ $i++ }}
        </td>
        <td>
            {{ state($selected_state->state_id) }}
        </td>
       
        <td class="">
         <a href="{{ route('city_index',$selected_state->state_id) }}" style="color:blue"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
          </svg>
          
          @php
             $data['citycount'] = DB::table('city')->where('state_id',$selected_state->id)->count();
          @endphp
          
          &nbsp View City ( {{ $data['citycount'] }} )</a>
          
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
        <h5 class="modal-title" id="exampleModalLabel">Select State</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('store_user_state') }}">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
        <select name="state" id="state" class="form-control" required style="width: 100%">
          <option value="not_selected" selected>Click to Select State</option>
          @foreach($data['statelist'] as $key => $statelist)
          <option value="{{ $statelist->id }}">{{ $statelist->state_name }}</option>
          @endforeach
        </select>
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
