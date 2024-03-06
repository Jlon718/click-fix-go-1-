@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="card col-12 m-auto mb-3 border-0 shadow-lg">
      <div class="card-header bg-dark-blue text-light">
        {{ __('Users') }}
      </div>
      <div class="card-body col-12 table-responsive-sm">
        <table class="table-hover table">
          <thead>
            <tr>
              <th>@sortablelink('personal_number', __('Personal number'), ['filter' => 'visible'], ['class' => 'text-decoration-none text-muted'])</th>
              <th>@sortablelink('last_name', __('Last name'), ['filter' => 'visible'], ['class' => 'text-decoration-none text-muted'])</th>
              <th>@sortablelink('first_name', __('First name'), ['filter' => 'visible'], ['class' => 'text-decoration-none text-muted'])</th>
              <th class="col-6">@sortablelink('email', __('Email address'), ['filter' => 'visible'], ['class' => 'text-decoration-none text-muted'])</th>
              <th>{{ __('Roles') }}</th>
              <th>@sortablelink('created_at', __('Created At'), ['filter' => 'visible'], ['class' => 'text-decoration-none text-muted'])</th>
              @can('admin')
                <th scope="col">
                  <div class="d-grid">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.users.create') }}"
                       role="button">{{ __('Create') }}</a>
                  </div>
                </th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->personal_number }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @foreach ($user->roles as $role)
                    <span
                          class="badge @if ($role->name === 'admin') bg-danger
                          @elseif ($role->name === 'agent') bg-success @endif bg-secondary">
                      {{ $role->name }}
                    </span>
                  @endforeach
                </td>
                <td>{{ $user->created_at->format('d. m. Y') }}</td>
                @can('admin')
                  <td width="80px">
                    <div class="w-100 d-flex gap-1">
                      <a class="btn btn-sm btn-primary" type="button"
                         href="{{ route('admin.users.edit', $user->id) }}"><i
                           class="fa-solid fa-pen"></i>
                        {{-- {{ __('Edit') }} --}}
                      </a>
                      <button class="btn btn-sm btn-danger" type="button"
                              onclick="event.preventDefault();
                              document.getElementById('delete-user-{{ $user->id }}').submit()"><i
                           class="fa-solid fa-trash"></i>
                        {{-- {{ __('Delete') }} --}}
                      </button>
                      <form class="d-none" id="delete-user-{{ $user->id }}"
                            action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                    </div>
                  </td>
                @endcan
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $users->appends(\Request::except('page'))->render() !!}
      </div>
    </div>
  </div>
@endsection
