@extends('layouts.app')

@section('content')
  <div class="container mb-3">
    <div class="card col-12 col-xl-10 m-auto border-0 shadow-lg">
      <div class="card-header bg-dark-blue text-light">
        {{ __('Permissions') }}
      </div>
      <div class="card-body">
        {{-- New Employee Ticket Form --}}
        <form action="{{ route('user.permissions.store') }}" method="POST">
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
            {{-- Department input --}}
            <div class="col-12 col-md-5">
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
              @error('type')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 col-md-5">
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
              @error('type')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          {{-- Title input --}}
          <div class="row mb-3">
            <div class="col-12 col-md-2">
              <label class="form-label" for="program">{{ __('Program') }}</label>
              <select class="form-select @error('program') is-invalid @enderror" id="program"
                      name="program" type="text">
                <option value="">{{ __('Program') }}</option>
                @foreach ($programs as $program)
                  <option value="{{ $program->id }}"
                          @if (old('program') == $program->id) selected @endif>
                    {{ __($program->name) }}
                  </option>
                @endforeach
              </select>
              @error('type')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 col-md-10">
              <label class="form-label" for="by_employee">{{ __('Podle zaměstnance') }}</label>
              <input class="form-control @error('by_employee') is-invalid @enderror" id="by_employee"
                     name="by_employee" type="text" value="{{ old('by_employee') }}">
              @error('by_employee')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          {{-- Issue input --}}
          <div class="row mb-3">
            <div class="col-12">
              <label class="form-label" for="issue">{{ __('Permissions') }}</label>
              <textarea class="form-control @error('issue') is-invalid @enderror" id="issue" name="issue"
                        type="text" value="{{ old('issue') }}" rows="7"></textarea>
              @error('issue')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          {{-- Category hidden field --}}
          <input name="category" type="hidden" value="permission">
          {{-- Buttons --}}
          <button class="btn btn-primary" type="submit">{{ __('Send') }}</button>
          <a class="btn btn-secondary" type="submit" href="{{ url('/') }}">{{ __('Close') }}
          </a>
        </form>
      </div>
    </div>
  </div>
@endsection
