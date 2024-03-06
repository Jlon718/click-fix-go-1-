@csrf
{{-- Name register input --}}
<div class="row mb-3">
  <div class="col-12">
    <label class="form-label" for="name">{{ __('Name') }}</label>
    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
           type="text"
           value="@isset($role){{ $role->name ?? old('name') }}@endisset"
           autofocus>
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
{{-- Buttons --}}
<button class="btn btn-primary" type="submit">{{ $buttonName }}</button>
<a class="btn btn-secondary" type="submit" href="{{ url()->previous() }}">{{ __('Back') }}</a>
