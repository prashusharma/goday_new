@extends('layouts.app')

@section("title", "Member Management")

@section("body-class", "g-sidenav-show bg-gray-200")


@section("action-btn")
<a class="btn btn-outline-warning btn-sm rounded-0" href="{{ route('users.createMember', $id) }}">Create Members</a>
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
        <th>Name</th>
        <th>Loan amount</th>
        <th>Sanction Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $member)
      <tr class="align-middle">
        <td class="text-center fw-bold">
            {{ $i++ }}
        </td>
        <td>
            {{ $member->name }}
        </td>
        <td>
          {{ $member->loan_amount }}
        </td>
        <td>
          {{ $member->sanction_date }}
        </td>
        <td class="d-flex justify-content-between align-items-center px-2">
        <span class="text-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
            </svg>
          </span>
          <a class="text-warning me-2" href="{{ route('users.editMember', $member->id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </a>
          <span class="text-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
            </svg>
          </span>
          <span class="text-danger">
          <a class="btn btn-primary" href="">Activate</a>
          </span>
        </td>
          <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Member Details</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex">
            <div class="column mx-3">
              <div>Name: <span class="name" style="font-weight: bold;">{{ $member->name }}</span></div>
              <div>Sanction date: <span class="sanction_date" style="font-weight: bold;">{{ $member->sanction_date }}</span></div>
              <div>Principle amount: <span class="principle" style="font-weight: bold;">{{ $member->principle }}</span></div>
              <div>Interest amount: <span class="interest_amount" style="font-weight: bold;">{{ $member->interest_amount }}</span></div>
              <div>Number of installment: <span class="number_of_installment" style="font-weight: bold;">{{ $member->number_of_installment }}</span></div>
              <div>EMI start date: <span class="start_date_of_installment" style="font-weight: bold;">{{ $member->start_date_of_installment }}</span></div>
              <div>Fine on due: <span class="percentage_fine_on_due" style="font-weight: bold;">{{ $member->percentage_fine_on_due }}</span></div>
              <div>Sanctioned amount: <span class="final_sanctioned_amount" style="font-weight: bold;">{{ $member->final_sanctioned_amount }}</span></div>
            </div>
            <div class="column mx-3">
              <div>Loan type: <span class="loan_type" style="font-weight: bold;">{{ $member->loan_type }}</span></div>
              <div>Available fund: <span class="opening_fund" style="font-weight: bold;">{{ $member->opening_fund }}</span></div>
              <div>Interest per anum: <span class="interest" style="font-weight: bold;">{{ $member->interest }}</span></div>
              <div>Payable amount: <span class="loan_amount" style="font-weight: bold;">{{ $member->loan_amount }}</span></div>
              <div>EMI: <span class="installment_amount" style="font-weight: bold;">{{ $member->installment_amount }}</span></div>
              <div>EMI end date: <span class="end_date_of_installment" style="font-weight: bold;">{{ $member->end_date_of_installment }}</span></div>
              <div>Extra charges: <span class="extra_charge" style="font-weight: bold;">{{ $member->extra_charge }}</span></div>
              <div>Installment type: <span class="installment_type" style="font-weight: bold;">{{ $member->installment_type }}</span></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Close</button>
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
