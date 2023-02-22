@extends('layouts.app')

@section("title", "Customize Your Company Labels.")

@section("action-btn")
@can('role-create')
<!-- <a class="btn btn-outline-primary btn-sm" href=""> Create New Role</a> -->
@endcan
@endsection


@section('content')
<div class="column">
  <div class="card col-md-6 p-3 my-3 mx-2" style="width: 48%;">
    <form method="post" action="{{ route('users.updateSystemSetting', auth()->user()->id) }}">
      {!! csrf_field() !!}
      @method("PATCH")
      <div class="column col-md-12">
        <input type="hidden" name="system_setting" value="1">
        <div class="col-md-12">
          <div class="input-group input-group-outline my-3 {{ auth()->user()->business_name ? 'is-filled' : '' }}">  
            <label class="form-label">Label First</label>
            <input type="text" name="company_label" value="{{ auth()->user()->business_name }}" class="form-control">
          </div>
        </div>
        <div style="text-align: center; font-size: 2rem; color: black;">
        &#x2199;&#x2193;&#x2198;
        </div>
        <div class="col-md-12">
          <div class="input-group input-group-outline my-3 {{ auth()->user()->branch_label ? 'is-filled' : '' }}">
            <label class="form-label">Label Second</label>
            <input type="text" name="branch_label" class="form-control" value="{{ auth()->user()->branch_label}}">
          </div>
        </div>
        <div style="text-align: center; font-size: 2rem; color: black;">
        &#x2199;&#x2193;&#x2198;
        </div>
        <div class="col-md-12">
          <div class="input-group input-group-outline my-3 {{ auth()->user()->group_label ? 'is-filled' : '' }}">
            <label class="form-label">Label Third</label>
            <input type="text" name="group_label" class="form-control" value="{{ auth()->user()->group_label}}">
          </div>
        </div>
      </div>
      <button class="btn btn-primary col-md-3" type="submit">Done</button>
    </form>
  </div>
</div>

@endsection