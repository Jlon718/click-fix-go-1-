@extends('layouts.base')
@section('body')
<div class="container">
    {!! Form::model($device, ['route' => ['devices.update', $device->device_id], 'class' => 'form-control',  'files' => true, 'method' => 'put']) !!}
    {{ Form::label('device_type', 'Device type', ['class' => 'form-control']) }}
    {!! Form::text('device_type', $device->device_type) !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <img src="{{ url($device->image) }}" alt="{{$device->device_type}} image" width="50" height="50">
    {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}     
    {!! Form::close() !!}
</div>
@endsection
