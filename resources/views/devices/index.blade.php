@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-4">We Repair and Clean It All!</h1>
    <p class="text-center mb-5">Choose your device type to explore our services:</p>
    <div class="device-gallery">
        <div class="row">
            <div class="col-md-4 col-sm-6 device-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Add new device to offer</h3>
                        <p class="card-text">Expand your scope</p>
                        <a href="{{route('devices.create')}}" class="btn btn-primary">Click here to add a new device</a>
                    </div>
                </div>
            </div>
            @foreach ($types as $type)
                <div class="col-md-4 col-sm-6 device-card">
                    <div class="card">
                        <img src="{{ asset($type->image) }}" alt="{{ $type->device_type }}" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">{{$type->device_type}}</h3>
                            <p class="card-text">Expert repairs for all major brands and models.</p>
                            <a href="/devices/{{$type->device_id}}/edit" class="btn btn-primary">Edit {{ $type->device_type }}</a>
                            <a href="/services/{{$type->device_id}}" class="btn btn-primary">Delete {{ $type->device_type }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
