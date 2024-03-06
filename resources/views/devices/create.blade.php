@extends('layouts.base')
@section('body')
<div class="container">
    {!! Form::open(['route' => 'devices.store', 'class' => 'form-control', 'enctype' => 'multipart/form-data', 'method' => 'post']) !!}
    {{ Form::label('device_type', 'Device type', ['class' => 'form-control']) }}
    {!! Form::text('device_type') !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}     
    {!! Form::close() !!}
</div>
@endsection
