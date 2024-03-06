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
                        <h3 class="card-title">CRUD devices</h3>
                        <p class="card-text">CRUD functionalities for devices</p>
                        <a href="/devices/index" class="btn btn-primary">Click here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 device-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">CRUD Services</h3>
                        <p class="card-text">CRUD functionalities for services</p>
                        <a href="/services/index" class="btn btn-primary">Click here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 device-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Manage Tickets</h3>
                        <p class="card-text">Upcoming tickets, fixing tickets, and finishe tickets</p>
                        <a href="/queues/index" class="btn btn-primary">Click here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 device-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Manage supplies</h3>
                        <p class="card-text">CRUD Supplies</p>
                        <a href="/services/index" class="btn btn-primary">Click here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 device-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Manage supplier</h3>
                        <p class="card-text">CRUD Supplier</p>
                        <a href="/services/index" class="btn btn-primary">Click here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 device-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Manage technicians</h3>
                        <p class="card-text">CRUD technicians</p>
                        <a href="/services/index" class="btn btn-primary">Click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
