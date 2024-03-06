@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="card col-12 col-md-12 m-auto border-0 shadow-lg">
      <div class="card-header bg-secondary text-light">
        <h3>
          {{ $ticket->id }} <i class="far fa-calendar-plus"></i> {{ $ticket->title }}
        </h3>
        <div class="justify-content-between d-flex">
          <div>
            <span class="text-dark">Author:</span>
            {{ $ticket->last_name }}
            {{ $ticket->first_name }}
          </div>
          <div>
            <span class="text-dark">Status:</span>
            {{ $ticket->status }}
          </div>
          <div>
            <span
                  class="badge @if ($ticket->category === 'it') bg-danger
                  @elseif ($ticket->category === 'medical') bg-info
                  @elseif ($ticket->category === 'maintenance') bg-warning @endif bg-secondary">
              {{ $ticket->category }}
            </span>
          </div>
          <div>
            <span class="text-dark">Agent:</span>
            Admin
          </div>
          <div>
            <span class="text-dark">Department:</span>
            {{ $ticket->department->department_name }}
          </div>
          <div>
            <span class="text-dark">Vloženo:</span>
            {{ $ticket->created_at->diffForHumans() }}
          </div>
        </div>
      </div>
      <div class="card-body">
        <p>{{ $ticket->issue }}</p>
      </div>
      <div class="card-header bg-warning text-dark">
        test
      </div>
      <div class="card-body bg-light">
        <p>{{ $ticket->issue }}</p>
      </div>
      <div class="card-header bg-success text-light">
        Vyřešeno
      </div>
      <div class="card-body">
        <p>{{ $ticket->issue }}</p>
        <a class="btn btn-secondary" type="submit"
           href="{{ url()->previous() }}">{{ __('Back') }}
        </a>
      </div>
    </div>
  @endsection
