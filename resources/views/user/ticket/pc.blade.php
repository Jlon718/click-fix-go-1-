@extends('layouts.app')

@section('content')
  <div class="container mb-3">
    <div class="card col-12 col-xl-10 m-auto border-0 shadow-lg">
      <div class="card-header bg-dark-blue text-light">
        {{ __('New Employee') }}
      </div>
      <div class="card-body">
        {{-- New Employee Ticket Form --}}
        <form action="{{ route('user.employees.store') }}" method="POST">
          @csrf
          {{-- Personal number input --}}
          <div class="row">
            <div class="col-12 col-lg-2">
              <label class="form-label" for="personal_number">{{ __('Personal number') }}</label>
              <input class="form-control @error('personal_number') is-invalid @enderror"
                     id="personal_number" name="personal_number" type="text"
                     value="{{ old('personal_number') }}" autofocus>
              @error('personal_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            {{-- Title 1 input --}}
            <div class="col-12 col-lg-2">
              <label class="form-label" for="title_preffix">{{ __('Title preffix') }}</label>
              <input class="form-control @error('title_preffix') is-invalid @enderror"
                     id="title_preffix" name="title_preffix" type="text"
                     value="{{ old('title_preffix') }}">
              @error('title_preffix')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            {{-- User Name input --}}
            <div class="col-12 col-lg-3">
              <label class="form-label" for="last_name">{{ __('Last name') }}</label>
              <input class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                     name="last_name" type="text" value="{{ old('last_name') }}">
              @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 col-lg-3">
              <label class="form-label" for="first_name">{{ __('First name') }}</label>
              <input class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                     name="first_name" type="text" value="{{ old('first_name') }}">
              @error('first_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            {{-- Title 2 input --}}
            <div class="col-12 col-lg-2">
              <label class="form-label" for="title_suffix">{{ __('Title suffix') }}</label>
              <input class="form-control @error('title_suffix') is-invalid @enderror"
                     id="title_suffix" name="title_suffix" type="text"
                     value="{{ old('title_suffix') }}">
              @error('title_suffix')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            {{-- Department input --}}
            <div class="col-12 col-md-6">
              <label class="form-label" for="department_id">{{ __('Department') }}</label>
              <select class="form-select @error('department_id') is-invalid @enderror"
                      id="department_id" name="department_id" type="text">
                <option value="">{{ __('Select department') }}</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}"
                          @if (old('department_id') == $department->id) selected @endif>
                    {{ __($department->vema_code) }} - {{ __($department->department_name) }}
                  </option>
                @endforeach
              </select>
              @error('department_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="job_id">{{ __('Function') }}</label>
              <select class="form-select @error('job_id') is-invalid @enderror" id="job_id"
                      name="job_id" type="text">
                <option value="">{{ __('Select function') }}</option>
                @foreach ($jobs as $job)
                  <option value="{{ $job->id }}"
                          @if (old('job_id') == $job->id) selected @endif>
                    {{ __($job->job_name) }}
                  </option>
                @endforeach
              </select>
              @error('job_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          {{-- Category hidden field --}}
          <input name="category" type="hidden" value="employee">
          {{-- Buttons --}}
          <button class="btn btn-primary" type="submit">{{ __('Send') }}</button>
          <a class="btn btn-secondary" type="submit" href="{{ url('/') }}">{{ __('Close') }}
          </a>
        </form>
      </div>
    </div>
  </div>
@endsection
