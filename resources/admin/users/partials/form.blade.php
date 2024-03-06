@csrf
{{-- Personal number register input --}}
<div class="row">
  <div class="col-12 col-md-3">
    <label class="form-label" for="personal_number">{{ __('Personal number') }}</label>
    <input class="form-control @error('personal_number') is-invalid @enderror" id="personal_number"
           name="personal_number" type="text"
           value="@isset($user){{ $user->personal_number ?? old('name') }}@endisset"
           autofocus>
    @error('personal_number')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  {{-- Last name register input --}}
  <div class="col-12 col-md-5">
    <label class="form-label" for="last_name">{{ __('Last name') }}</label>
    <input class="form-control @error('last_name') is-invalid @enderror" id="last_name"
           name="last_name" type="text"
           value="@isset($user){{ $user->last_name ?? old('last_name') }}@endisset"
           autofocus>
    @error('last_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-12 col-md-4">
    <label class="form-label" for="first_name">{{ __('First name') }}</label>
    <input class="form-control @error('first_name') is-invalid @enderror" id="first_name"
           name="first_name" type="text"
           value="@isset($user){{ $user->first_name ?? old('first_name') }}@endisset"
           autofocus>
    @error('first_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
{{-- Email register input --}}
<div class="row mb-3">
  <div class="col-12">
    <label class="form-label" for="email">{{ __('Email address') }}</label>
    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
           type="email"
           value="@isset($user){{ $user->email ?? old('email') }}@endisset">
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
{{-- Password register input --}}
@isset($create)
  <div class="row mb-3">
    <div class="col-12">
      <label class="form-label" for="password">{{ __('Password') }}</label>
      <input class="form-control @error('password') is-invalid @enderror" id="password"
             name="password" type="password">
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
@endisset
{{-- Roles --}}
<div class="mb-3">
  @foreach ($roles as $role)
    <div class="form-check">
      <input class="form-check-input" id="{{ $role->name }}" name="roles[]" type="checkbox"
             value="{{ $role->id }}"
             @isset($user)@if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
      <label for="{{ $role->name }}"></label>
      {{ $role->name }}
    </div>
  @endforeach
</div>
{{-- Buttons --}}
<button class="btn btn-primary" type="submit">{{ $buttonName }}</button>
<a class="btn btn-secondary" type="submit" href="{{ url()->previous() }}">{{ __('Back') }}</a>
