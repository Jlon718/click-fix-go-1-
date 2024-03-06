@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="card col-12 m-auto mb-3 border-0 shadow-lg">
      <div class="card-header bg-dark-blue text-light">
        {{ __('Roles') }}
      </div>
      <div class="card-body col-12">
        <table class="table-hover table">
          <thead>
            <tr>
              <th>@sortablelink('name', __('Name'), ['filter' => 'visible'], ['class' => 'text-decoration-none text-muted'])</th>
              @can('admin')
                <th scope="col">
                  <div class="d-grid">
                    <a class="btn btn-sm btn-block btn-success" href="{{ route('admin.roles.create') }}"
                       role="button">{{ __('Create') }}</a>
                  </div>
                </th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
              <tr>
                <td>{{ $role->name }}</td>
                @can('admin')
                  <td width="80px">
                    <div class="w-100 d-flex gap-1">
                      <a class="btn btn-sm btn-primary" type="button"
                         href="{{ route('admin.roles.edit', $role->id) }}"><i
                           class="fa-solid fa-pen"></i>
                        {{-- {{ __('Edit') }} --}}
                      </a>
                      <button class="btn btn-sm btn-danger" type="button"
                              onclick="event.preventDefault();
                  document.getElementById('delete-role-{{ $role->id }}').submit()"><i
                           class="fa-solid fa-trash"></i>
                        {{-- {{ __('Delete') }} --}} </button>
                      <form class="d-none" id="delete-role-{{ $role->id }}"
                            action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
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
        {!! $roles->appends(\Request::except('page'))->render() !!}
      </div>
    </div>
  </div>
@endsection
