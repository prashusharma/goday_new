@extends('layouts.app')

@section("title", "Staff List")

@section("action-btn")
<a class="btn btn-outline-primary btn-sm rounded-0" href="{{ route('users.create') }}">Create New Account</a>
@endsection

@section('content')
<div class="px-2 table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">S.No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    @php
      $i=0;
    @endphp
    <tbody>
      @foreach ($data as $key => $user)
      <tr class="align-middle">
        <td class="text-center fw-bold">
          {{ ++$i }}
        </td>
        <td>
          {{ $user->name }}
        </td>
        <td>
          {{ $user->email }}
        </td>
        <td>
          <!-- @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success text-danger">{{ $v }}</label>
            @endforeach
          @endif -->
          {{ $user->role }}
        </td>
        <td>
          {{ $user->created_at }}
        </td>
        <td class="d-flex justify-content-evenly">
          <span class="text-warning me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
          </span>
          <span class="text-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
            </svg>
          </span>
          <button class="btn btn-primary" data-status="{{ $user->status }}" data-user-id="{{ $user->id }}" onclick="updateUserStatus(this)">
            {{ $user->status ? 'Deactivate' : 'Activate' }}
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('js')
<script>
  function updateUserStatus(button) {
    const userId = button.dataset.userId;
    const status = button.dataset.status == 1 ? 0 : 1;

    axios.put('/users/' + userId + '/status', {
        status: status
      })
      .then(response => {
        if(response == 'success') {
          location.reload();
        }
        button.dataset.status = status;
        button.innerText = status ? 'Deactivate' : 'Activate';
      })
      .catch(error => {
        console.log(error);
      });
  }
</script>
@endsection