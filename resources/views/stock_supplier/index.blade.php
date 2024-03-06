@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Stock Suppliers</h2>
        <a href="{{ route('stock-suppliers.create') }}" class="btn btn-primary mb-3">Create Stock Supplier</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Stock Name</th>
                    <th>Supplier Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stockSuppliers as $stockSupplier)
                <tr>
                    <td>{{ $stockSupplier->id }}</td>
                    <td>{{ $stockSupplier->stock_name }}</td>
                    <td>{{ $stockSupplier->supplier_name }}</td>
                    <td>
                        <a href="{{ route('stock-suppliers.edit', $stockSupplier->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('stock-suppliers.destroy', $stockSupplier->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this stock supplier?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection