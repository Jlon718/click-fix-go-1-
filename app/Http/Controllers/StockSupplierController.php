<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockSupplier;

class StockSupplierController extends Controller
{
    public function index()
    {
        $stockSuppliers = StockSupplier::all();
        return view('stock_suppliers.index', compact('stockSuppliers'));
    }

    public function create()
    {
        return view('stock_suppliers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stock_id' => 'required',
            'stock_name' => 'required',
            'supplier_id' => 'required',
            'supplier_name' => 'required',
        ]);

        StockSupplier::create($validatedData);

        return redirect()->route('stock-suppliers.index')
            ->with('success', 'Stock Supplier created successfully.');
    }

    public function show(StockSupplier $stockSupplier)
    {
        return view('stock_suppliers.show', compact('stockSupplier'));
    }

    public function edit(StockSupplier $stockSupplier)
    {
        return view('stock_suppliers.edit', compact('stockSupplier'));
    }

    public function update(Request $request, StockSupplier $stockSupplier)
    {
        $validatedData = $request->validate([
            'stock_id' => 'required',
            'stock_name' => 'required',
            'supplier_id' => 'required',
            'supplier_name' => 'required',
        ]);

        $stockSupplier->update($validatedData);

        return redirect()->route('stock-suppliers.index')
            ->with('success', 'Stock Supplier updated successfully');
    }

    public function destroy(StockSupplier $stockSupplier)
    {
        $stockSupplier->delete();

        return redirect()->route('stock-suppliers.index')
            ->with('success', 'Stock Supplier deleted successfully');
    }
}
