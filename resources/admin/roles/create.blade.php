@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 col-md-6 m-auto border-0 shadow-lg">
      <div class="card-header bg-dark-blue text-light">
        {{ __('Create') }}
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.roles.store') }}">
          @include('admin.roles.partials.form', [
              'create' => true,
              'buttonName' => __('Create'),
          ])
        </form>
      </div>
    </div>
  </div>
@endsection
