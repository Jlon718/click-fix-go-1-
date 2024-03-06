<?php

namespace Database\Seeders;
use App\Models\Device;
use App\Models\Service;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Deviceservice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Device::factory(4)->create();
        Service::factory(6)->create();
        Deviceservice::factory(15)->create();
    }
}
