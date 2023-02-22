@extends('layouts.app')

@section("title")
{{ auth()->user()->branch_label }} Management
@endsection

@section("body-class", "g-sidenav-show bg-gray-200")


@section("action-btn")
<a class="btn btn-outline-warning btn-sm rounded-0" href="{{ route('branch.create',) }}">Create {{ auth()->user()->branch_label }}</a>
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
        <th>{{ auth()->user()->branch_label }} Name</th>
        <th>Email</th>
        <th>Area</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $branch)
      <tr class="align-middle">
        <td class="text-center fw-bold">
          {{ $i++ }}
        </td>
        <td>
          {{ $branch->branch_name }}
        </td>
        <td>
          {{ $branch->email }}
        </td>
        <td>
          {{ $branch->area }}
        </td>
        <td class="d-flex justify-content-between align-items-center px-2">
          <span class="text-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
            </svg>
          </span>
          <a class="text-warning me-2" href="{{ url('/branch/'.$branch->id.'/edit') }}" onclick="return confirm('Are you sure you want to edit this branch?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
          </a>

          <span class="text-danger">
            <form action="{{ url('/branch/'.$branch->id) }}" method="POST" title="Delete department" accept-charset="UTF-8" style="display: inline;">
              {{ method_field('Delete') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to delete this branch?')">Delete</button>
            </form>
          </span>
          @php
          $group_count = 0;
          $branch_id = $branch->id;
          countGroup($group_count, $branch_id);
          @endphp
          <span class="text-danger">
            <a class="btn btn-primary" href="{{ route('group.show', $branch->id) }}">Create {{ auth()->user()->group_label }} ({{ $group_count }})</a>
          </span>
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
                    <div>Name: <span class="mb-3 input-group-outline name" style="font-weight: bold;">{{ $branch->branch_name }}</span></div>
                    <div>{{ auth()->user()->branch_label }} code: <span class="mb-3 input-group-outline sanction_date" style="font-weight: bold;">{{ $branch->branch_code }}</span></div>
                    <div>{{ auth()->user()->branch_label }} opening Date: <span class="mb-3 input-group-outline principle" style="font-weight: bold;">{{ $branch->opening_date }}</span></div>
                    <div>{{ auth()->user()->branch_label }} opening fund: <span class="mb-3 input-group-outline interest_amount" style="font-weight: bold;">{{ $branch->opening_fund }}</span></div>
                    <div>Email: <span class="mb-3 input-group-outline number_of_installment" style="font-weight: bold;">{{ $branch->email }}</span></div>
                    <div>Contact number: <span class="mb-3 input-group-outline start_date_of_installment" style="font-weight: bold;">{{ $branch->contact_number }}</span></div>
                    <div>State: <span class="mb-3 input-group-outline percentage_fine_on_due" style="font-weight: bold;">{{ $branch->state }}</span></div>
                    <div>City: <span class="mb-3 input-group-outline final_sanctioned_amount" style="font-weight: bold;">{{ $branch->city }}</span></div>
                    <div>Area: <span class="mb-3 input-group-outline percentage_fine_on_due" style="font-weight: bold;">{{ $branch->area }}</span></div>
                    <div>Pincode: <span class="mb-3 input-group-outline final_sanctioned_amount" style="font-weight: bold;">{{ $branch->pincode }}</span></div>
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