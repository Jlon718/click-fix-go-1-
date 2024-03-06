<!-- resources/views/suppliers/edit.blade.php -->

@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Supplier</h1>

    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('suppliers.update', ['supplier' => $supplier->supplier_id]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label for="supplier_name">Supplier Name</label>
            <input type="text" id="supplier_name" name="supplier_name" value="{{ $supplier->supplier_name }}" placeholder="Supplier Name"/>
        </div>

        <div>
            <label for="supplier_email">Supplier Email</label>
            <input type="email" id="supplier_email" name="supplier_email" value="{{ $supplier->supplier_email }}" placeholder="Supplier Email"/>
        </div>

        <div>
            <label for="contact_number">Contact Number</label>
            <input type="text" id="contact_number" name="contact_number" value="{{ $supplier->contact_number }}" placeholder="Contact Number"/>
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ $supplier->address }}" placeholder="Address"/>
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</div>
@endsection
