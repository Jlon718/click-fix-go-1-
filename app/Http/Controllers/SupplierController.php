<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_email' => 'required|email|unique:suppliers',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Create a new Supplier instance and assign values from validated data
        $suppliers = new Supplier();
        $suppliers->supplier_name = $validatedData['supplier_name'];
        $suppliers->supplier_email = $validatedData['supplier_email'];
        $suppliers->contact_number = $validatedData['contact_number'];
        $suppliers->address = $validatedData['address'];
       
        // Save the product to the database
        $suppliers->save();

        // Redirect the user to a route after successful creation, with a success message
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
{
    // Load the supplier data and pass it to the view for editing
    return view('suppliers.edit', compact('supplier'));
}

public function update(Supplier $supplier, Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'supplier_name' => 'required|string|max:255',
        'supplier_email' => 'required|email',
        'contact_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ]);

    // Update the supplier with validated data
    $supplier->update($validatedData);

    // Redirect back with success message
    return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
}

public function destroy(Supplier $supplier)
{
    // Delete the supplier
    $supplier->delete();

    return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
}
}
