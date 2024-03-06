<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
class BrandController extends Controller
{
    public function index()
    {
        //$brands = DB::table('brands')->join('smartphones', 'brand_id', '=', 'brands.id')->get();
        $brands = DB::table('brands')->get();
        return View::make('devices.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
