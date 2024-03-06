<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = DB::table('devices')->get();
        return View::make('home', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'image' => 'mimes:jpg,bmp,png',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $path = Storage::putFileAs(
            'public/images/devices',
            $request->file('image'),
            $request->file('image')->getClientOriginalName()
        );

        $device = new Device();
        $device->device_type = $request->device_type;
        $device->image = 'storage/images/devices/' . $request->file('image')->getClientOriginalName();
        $device->save();
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
    public function edit($id)
    {
        $device = Device::where('device_id', $id)->first();
        return View::make('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'image' => 'mimes:jpg,bmp,png',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else if ($request->file('image')) 
        {
            $path = Storage::putFileAs(
                'public/images/devices',
                $request->file('image'),
                $request->file('image')->getClientOriginalName()
            );

            $device = Device::where('device_id', $id)->update([
                'device_type' => $request->device_type,
                'image' => 'storage/images/devices/' . $request->file('image')->getClientOriginalName()
            ]);
        }else{
            $device = Device::where('device_id', $id)->update([
                'device_type' => $request->device_type,
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexAdmin()
    {
        $types = DB::table('devices')->get();
        return View::make('devices.index', compact('types'));
    }
}
