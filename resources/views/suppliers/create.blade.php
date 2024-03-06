@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'suppliers.store', 'class' => 'form-control', 'method' => 'post']) !!}
    {{ Form::label('supplier_name', 'Supplier Name') }}
    {!! Form::text('supplier_name', null, ['class' => 'form-control']) !!}
    {{ Form::label('supplier_email', 'Supplier Email') }}
    {!! Form::email('supplier_email', null, ['class' => 'form-control']) !!}
    {{ Form::label('contact_number', 'Contact Number') }}
    {!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
    {{ Form::label('address', 'Address') }}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
