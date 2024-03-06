@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-4">We Repair and Clean It All!</h1>
    <p class="text-center mb-5">Choose your device type to explore our services:</p>
    <div class="device-gallery">
        <div class="row">
            @foreach ($queues as $queue)
                <div class="col-md-4 col-sm-6 device-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Queue: {{ $queue }}</h3>
                            <p class="card-text">Manage queue {{ $queue }}</p>
                            <a href="/queues/{{$queue}}/tickets" class="btn btn-primary">Manage Queue</a>
                            <a href="/queues/{{$queue}}/finish" class="btn btn-primary">Finish Queue</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection