@extends('layouts.app')

@section('content')
  <div class="container mb-3">
    <div class="card col-12 col-xl-10 m-auto border-0 shadow-lg">
      <div class="card-header bg-dark-blue text-light">
        {{ __('Ticket') . ' ' . __('for') . ' ' . __('IT department') }}
      </div>
      <div class="card-body">
        {{-- Alert --}}
        @if (!Auth::user())
          <div class="alert alert-warning text-center" role="alert">
            {{ __('If you register, you will not have to re-enter your personal information and you will see the history of your requests.') }}
          </div>
        @endif
        {{-- Computer Ticket Form --}}
        <form action="{{ route('user.tickets.store') }}" method="POST">
          @csrf
          {{-- Personal number input --}}
          <div class="row">
            <div class="col-12 col-lg-2">
              <label class="form-label" for="personal_number">{{ __('Personal number') }}</label>
              <input class="form-control @error('personal_number') is-invalid @enderror"
                     id="personal_number" name="personal_number" type="text"
                     value="{{ Auth::user()->personal_number ?? old('personal_number') }}"
                     {{ Auth::user() ?? 'autofocus' }}>
              @error('personal_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            {{-- User Name input --}}
            <div class="col-12 col-lg-3">
              <label class="form-label" for="last_name">{{ __('Last name') }}</label>
              <input class="form-control @error('name') is-invalid @enderror" id="last_name"
                     name="last_name" type="text"
                     value="{{ Auth::user()->last_name ?? old('last_name') }}"
                     {{ Auth::user() ?? 'autofocus' }}>
              @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 col-lg-3">
              <label class="form-label" for="first_name">{{ __('First name') }}</label>
              <input class="form-control @error('name') is-invalid @enderror" id="first_name"
                     name="first_name" type="text"
                     value="{{ Auth::user()->first_name ?? old('first_name') }}"
                     {{ Auth::user() ?? 'autofocus' }}>
              @error('first_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            {{-- User Email input --}}
            <div class="col-12 col-lg-2">
              <label class="form-label" for="email">{{ __('Email') }}</label>
              <input class="form-control @error('email') is-invalid @enderror" id="email"
                     name="email" type="email" value="{{ Auth::user()->email ?? old('email') }}"
                     {{ Auth::user() ?? 'autofocus' }}>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12 col-lg-2">
              <label class="form-label" for="phone">{{ __('Phone') }}</label>
              <input class="form-control @error('phone') is-invalid @enderror" id="phone"
                     name="phone" type="text" value="{{ Auth::user()->phone ?? old('phone') }}"
                     {{ Auth::user() ?? 'autofocus' }}>
              @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row">
            {{-- Computer ID number input --}}
            <div class="col-12 col-lg-2">
              <label class="form-label" for="id_pc">{{ __('Computer ID') }}</label>
              <input class="form-control @error('id_pc') is-invalid @enderror" id="id_pc"
                     name="id_pc" type="text" value="{{ old('id_pc') }}" autofocus>
              @error('id_pc')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12 col-lg-10">
              <label class="form-label" for="title">{{ __('Title') }}</label>
              <input class="form-control @error('title') is-invalid @enderror" id="title"
                     name="title" type="text" value="{{ old('title') }}">
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          {{-- Issue input --}}
          <div class="row mb-3">
            <div class="col-12">
              <label class="form-label" for="issue">{{ __('Issue') }}</label>
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
          <input name="category" type="hidden" value="it">
          <input name="status" type="hidden" value="new">
          {{-- Buttons --}}
          <button class="btn btn-primary" type="submit">{{ __('Send') }}</button>
          <a class="btn btn-secondary" type="submit"
             href="{{ url('/') }}">{{ __('Close') }}
          </a>
        </form>
      </div>
    </div>
  </div>
@endsection
