<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'baby nurse',
            'description' => 'The best nurses to look after your children are here.',
            'image_name' =>'baby_nurse.jpg'
        ]);

        Category::create([
            'name' => 'elderly nurse',
            'description' => 'The most experienced and best nurses are trained to care for your elderly and loved ones',
            'image_name' =>'elderly_nurse.jpg'
        ]);

        Category::create([
            'name' => 'injector',
            'description' => 'Do injections and dressings at home',
            'image_name' =>'injector.jpg'
        ]);

        Category::create([
            'name' => 'patient nurse',
            'description' => 'Nursing patients at home by the most experienced',
            'image_name' =>'patient_nurse.jpg'
        ]);
    }
}
