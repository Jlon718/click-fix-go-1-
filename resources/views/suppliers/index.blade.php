@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suppliers</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('suppliers.create') }}" class="btn btn-success">Create Supplier</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Actions</th> <!-- Added a column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->supplier_id }}</td>
                    <td>{{ $supplier->supplier_name }}</td>
                    <td>{{ $supplier->supplier_email }}</td>
                    <td>{{ $supplier->contact_number }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->supplier_id) }}" class="btn btn-primary">Edit</a>
                        <form method="post" action="{{ route('suppliers.destroy', $supplier->supplier_id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
