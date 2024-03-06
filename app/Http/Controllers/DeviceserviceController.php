<?php

namespace App\Http\Controllers;

use App\Models\Deviceservice;
use Illuminate\Http\Request;
use View;

class DeviceserviceController extends Controller
{
    public function index($id)
    {
        $services = Deviceservice::where('device_id', $id)->get();
        return View::make('services.index', compact('services'));
    }
}
