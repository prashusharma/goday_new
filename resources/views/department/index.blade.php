@extends('layouts.app')

@section("title", "Department Management")

@section("body-class", "g-sidenav-show bg-gray-200")


@section("action-btn")
<a class="btn btn-outline-warning btn-sm rounded-0" href="{{ route('department.create') }}">Add Department</a>
<a class="btn btn-outline-warning rounded-0 btn-sm" href="{{ route('users.create') }}">Back</a>
@endsection

@section('content')
<div class="px-2 table-responsive">
  @php
  $i = 1;
  @endphp
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">S.No.</th>
        <th>Company Id</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($departments as $department)
      <tr class="align-middle">
        <td class="text-center fw-bold">
          {{ $i++ }}
        </td>
        <td>
          {{ $department->company_id }}
        </td>
        <td>
          {{ $department->department }}
        </td>
        <td class="d-flex justify-content-around align-items-center px-5">
          <a class="text-warning me-2 hover-pointer" href="{{ url('/department/'.$department->id.'/edit') }}" onclick="return confirm('Are you sure you want to edit this department?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
          </a>
          <form action="{{ url('/department/'.$department->id) }}" method="POST" title="Delete department" accept-charset="UTF-8" style="display: inline;">
            {{ method_field('Delete') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm mb-0" onclick="return confirm('Do you want to delete this department?')">Delete</button>
          </form>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection