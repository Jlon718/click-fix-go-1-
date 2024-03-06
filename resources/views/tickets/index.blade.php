@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-4">We Repair and Clean It All!</h1>
    <p class="text-center mb-5">Choose your device type to explore our services:</p>
    <div class="device-gallery">
        <div class="row">
            @foreach ($tickets as $ticket)
                <div class="col-md-4 col-sm-6 device-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $ticket->device_type }}</h3>
                            <p class="card-text">Issue: {{ $ticket->service_type }}</p>
                            <p class="card-text">Status: {{ $ticket->status }}</p>
                            <a href="/queues/{{$ticket->ticket_id}}/tickets/repair" class="btn btn-primary">Repair</a>
                            <a href="/queues/{{$ticket->ticket_id}}/tickets/finish" class="btn btn-primary">Finish</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection