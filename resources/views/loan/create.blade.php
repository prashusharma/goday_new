@extends('layouts.app')

@section("title", "Create Loans.")

@section("css")
<style>
  .form-select:focus {
    border-color: gray;
  }
</style>
@endsection

@section('content')
<div class="column">
  <div class="card p-3 my-3 mx-2">
    <form method="post" action="{{ route('loan-master.store') }}">
      {!! csrf_field() !!}
      <div class="column">
        <div class="row">
          <div class="col-md-6">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Loan Name</label>
              <input type="text" name="loan_name" class="form-control" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Loan Code</label>
              <input type="text" name="loan_code" class="form-control" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <select class="form-select input-group-outline my-3 px-3" name="interest_type" aria-label="Default select example">
              <option selected>Installment Frequency</option>
              <option value="daily">Daily</option>
              <option value="weekly">Weekly</option>
              <option value="monthly">Monthly</option>
              <option value="yearly">Yearly</option>
            </select>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Installment Frequency in One Year</label>
              <input type="number" name="interest_type_value" class="form-control" autocomplete="off" required>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary col-md-3" type="submit">Save</button>
    </form>
  </div>
</div>

@endsection