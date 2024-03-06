<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Brand;
use App\Models\Device;
use App\Models\Smartphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;



class SmartphoneController extends Controller
{
    public function index($id){
        $smartphones = Smartphone::where('brand_id', $id)->get();
        return View::make('devices.smartphones.index', compact('smartphones'));
    }

    public function create()
    {
        $brands = DB::table('brands')->get();
        $devices = DB::table('devices')->get();
        return View::make('devices.smartphones.create', compact('brands','devices'));
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

        $brand = Brand::findOrFail($request->brand_id);
        $smartphone = new Smartphone();
        $smartphone->device_name = $request->device_name;
        $smartphone->brand = $brand->brand_name;
        $smartphone->brand_id = $request->brand_id;
        $smartphone->release_date = $request->release_date;
        $smartphone->device_type_id = $request->device_type_id;

        $path = Storage::putFileAs(
            'public/images/smartphones',
            $request->file('image'),
            $request->file('image')->getClientOriginalName()
        );

        $smartphone->image = 'storage/images/smartphones/' . $request->file('image')->getClientOriginalName();
        $smartphone->save();
        return redirect()->route('smartphone.index', ['id' => $request->brand_id]);
        // //dd($request);
        // $rules = [
        //     'image' => 'mimes:jpg,bmp,png',
        // ];

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // $brand = Brand::findOrFail($request->brand_id);
        // $smartphone = new Smartphone();
        // $smartphone->device_name = $request->device_name;
        // $smartphone->brand = $brand->brand_name;
        // $smartphone->brand_id = $request->brand_id;
        // $smartphone->release_date = $request->release_date;
        // $smartphone->device_type_id = $request->device_type_id;

        // $path = Storage::putFileAs(
        //     '/public/images/smartphones',
        //     $request->file('image'),
        //     $request->file('image')->getClientOriginalName()
        // );

        // // $file = $request->file('image');
        
        // //         $destinationPath = 'public/images/smartphones'; // Destination directory
        // //         $fileName = $file->getClientOriginalName(); // Original file name
        
        // //         // Move the uploaded file to the destination directory
        // //         $moved = move_uploaded_file($fileName, $destinationPath.'/'.$fileName);
        
        // //         if ($moved) {
        // //             // File was successfully moved
        // //             $path = $destinationPath.'/'.$fileName;
        // //         } else {
        // //             // Failed to move the file
        // //             $path = null;
        // //         }

        // $smartphone->image = 'storage/app/public/images/smartphones/' . $request->file('image')->getClientOriginalName();
        // $smartphone->save();
        // // dd($request->file('img_path'));
        // return redirect()->route('smartphone.index', ['id' => $request->brand_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $smartphone = Smartphone::find($id);
        $brands = Brand::pluck('brand_name', 'id')->all();
        $brand =Brand::find($smartphone->brand_id);
        $devices = Device::pluck('device_type','id')->all();
        $device = Device::find($smartphone->device_type_id);

        return View::make('devices.smartphones.edit', compact('smartphone', 'brands', 'brand', 'devices', 'device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $rules = [
            'image' => 'mimes:jpg,bmp,png',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file('image')) {
            $path = Storage::putFileAs('public/images/smartphones',
                $request->file('image'),
                $request->file('image')->getClientOriginalName()
            );
            //$path = $request->file('image')->storeAs('public/images/smartphones', $request->file('image')->getClientOriginalName());
            // Generate the complete URL for the image
            $imageURL = asset(str_replace('public', 'storage', $path)); 
            $brand = Brand::findOrFail($request->brand_id);
            $smartphone = Smartphone::where('id', $id)->update([
                'device_name' => $request->device_name,
                'brand' => $brand->brand_name,
                'brand_id' => $request->brand_id,
                'release_date' => $request->release_date,
                'device_type_id' => $request->device_type_id,
                'image' => $imageURL
            ]);
        }
        else {
            $brand = Brand::findOrFail($request->brand_id);
            $smartphone = Smartphone::where('id', $id)->update([
                'device_name' => $request->device_name,
                'brand' => $brand->brand_name,
                'brand_id' => $request->brand_id,
                'release_date' => $request->release_date,
                'device_type_id' => $request->device_type_id,
            ]);
        }
        // dd($request->file('img_path'));
        return redirect()->route('smartphone.index', ['id' => $request->brand_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
