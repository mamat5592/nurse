<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionNames = [];
        $counter = 0;

        $path = app_path('Models') . '/*.php';
        $modelNames = collect(glob($path))->map(fn ($file) => basename($file, '.php'))->toArray();

        foreach($modelNames as $modelName){
            $permissionNames[$counter++] = $modelName . '@viewAny';
            $permissionNames[$counter++] = $modelName . '@view';
            $permissionNames[$counter++] = $modelName . '@create';
            $permissionNames[$counter++] = $modelName . '@update';
            $permissionNames[$counter++] = $modelName . '@delete';
            $permissionNames[$counter++] = $modelName . '@restore';
            $permissionNames[$counter++] = $modelName . '@forceDelete';
        }

        foreach($permissionNames as $permissionName){
            Permission::create(['title' => $permissionName]);
        }
    }
}
