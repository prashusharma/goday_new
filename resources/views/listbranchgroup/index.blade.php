@extends('layouts.app')

@section("title")
{{ auth()->user()->branch_label }} Management
@endsection

@section("body-class", "g-sidenav-show bg-gray-200")


@section("css")
<style>
  .select2-selection__rendered {
    line-height: 31px !important;
  }

  .select2-container .select2-selection--single {
    height: 35px !important;
  }

  .select2-selection__arrow {
    height: 34px !important;
  }
</style>
@endsection
@php
@endphp
@section('content')
<div class="fs-5 mb-1">Filter Branch Wise</div>
<div class="d-flex gap-3 flex-wrap">
  <div class="col-md-3 rounded-0">
    <select class="select2-branch" id="branchwisefltr" style="width: 100%;" onchange="window.location.href = `{{ route('list-branch-group.index') }}?branch_id=`+this.value">
      <option></option>
      @foreach($branch as $key => $branch_value)
      <option value="{{ $branch_value->id }}" {{ $branch_id == $branch_value->id ? "selected" : "" }}>{{ $branch_value->branch_name }}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-3 rounded-0">
    <select class="select2-group" style="width: 100%;" {{ !count($filter_group) ? "disabled" : ""}}  onchange="window.location.href = `{{ route('list-branch-group.index') }}?branch_id={{$branch_id}}&group_id=`+this.value">
      <option></option>
      @foreach($filter_group as $key => $filter_group_value)
      <option value="{{ $filter_group_value->id }}" {{ $group_id == $filter_group_value->id ? "selected" : "" }}>{{ $filter_group_value->group_name }}</option>
      @endforeach
    </select>
  </div>
</div>

<div style="height: 20px;"></div>
<div style="height: 20px;"></div>

<div class="px-2 table-responsive">
  @php
  $i = 1;
  @endphp
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>{{ auth()->user()->branch_label }} Name</th>
        <th>{{ auth()->user()->group_label }} Name</th>
        <th>Stae</th>
        <th>City</th>
        <th>Area</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $group)
      <tr class="align-middle">
        <td class="text-center fw-bold">
          {{ $i++ }}
        </td>
        <td>
          {{ $group->branch->branch_name }}
        </td>
        <td>
          {{ $group->group_name }}
        </td>
        <td>
          {{ $group->state }}
        </td>
        <td>
          {{ $group->city }}
        </td>
        <td>
          {{ $group->area }}
        </td>
        <td class="d-flex justify-content-between align-items-center px-2">
          <span class="text-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
              </svg>
          </span>
          <a class="text-warning me-2" href="{{ route('users.createMember', $group->id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
          </a>
        </td>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Branch Details</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="d-flex">
                  <div class="column mx-3">
                    <div>Name: <span class="mb-3 input-group-outline name" style="font-weight: bold;">{{ $group->branch_name }}</span></div>
                    <div>{{ auth()->user()->branch_label }} code: <span class="mb-3 input-group-outline sanction_date" style="font-weight: bold;">{{ $group->branch_code }}</span></div>
                    <div>{{ auth()->user()->branch_label }} opening date: <span class="mb-3 input-group-outline principle" style="font-weight: bold;">{{ $group->opening_date }}</span></div>
                    <div>{{ auth()->user()->branch_label }} opening fund: <span class="mb-3 input-group-outline interest_amount" style="font-weight: bold;">{{ $group->opening_fund }}</span></div>
                    <div>Email: <span class="mb-3 input-group-outline number_of_installment" style="font-weight: bold;">{{ $group->email }}</span></div>
                    <div>Contact number: <span class="mb-3 input-group-outline start_date_of_installment" style="font-weight: bold;">{{ $group->contact_number }}</span></div>
                    <div>State: <span class="mb-3 input-group-outline percentage_fine_on_due" style="font-weight: bold;">{{ $group->state }}</span></div>
                    <div>City: <span class="mb-3 input-group-outline final_sanctioned_amount" style="font-weight: bold;">{{ $group->city }}</span></div>
                    <div>Area: <span class="mb-3 input-group-outline percentage_fine_on_due" style="font-weight: bold;">{{ $group->area }}</span></div>
                    <div>Pincode: <span class="mb-3 input-group-outline final_sanctioned_amount" style="font-weight: bold;">{{ $group->pincode }}</span></div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $data->render() !!}
</div>
@endsection

@section("js")
<script>
  $(".select2-branch").select2({
    placeholder: "Select Branch"
  });

  $(".select2-group").select2({
    placeholder: "Select Group"
  });

  // $("#branchwisefltr").change(function(e) {
  //   e.preventDefault();

  //   let that = $(this);

  //   $.ajax({
  //     type: "GET",
  //     url: "{{ route('branch.group.filter') }}",
  //     data: {
  //       branch_id: that.val()
  //     },
  //     dataType: "JSON",
  //     success: function(response) {
  //       console.log(response);
  //     }
  //   });


  // });

  function branchWiseFilter(val) {
    
  }
</script>
@endsection