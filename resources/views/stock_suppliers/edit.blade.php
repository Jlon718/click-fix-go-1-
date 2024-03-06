@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Stock Supplier</h2>
        <form method="POST" action="{{ route('stock-suppliers.store') }}">
            @csrf
            <div class="form-group">
                <label for="stock_id">Stock ID</label>
                <input type="text" class="form-control" id="stock_id" name="stock_id">
            </div>
            <div class="form-group">
                <label for="stock_name">Stock Name</label>
                <input type="text" class="form-control" id="stock_name" name="stock_name">
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier ID</label>
                <input type="text" class="form-control" id="supplier_id" name="supplier_id">
            </div>
            <div class="form-group">
                <label for="supplier_name">Supplier Name</label>
                <input type="text" class="form-control" id="supplier_name" name="supplier_name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection