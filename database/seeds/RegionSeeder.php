<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $regions = [
            ['name' => 'شمال غزة'],
            ['name' => 'غزة'],
            ['name' => 'الوسطى'],
            ['name' => 'خانيونس'],
            ['name' => 'رفح'],
        ];
        foreach ($regions as $region){
            \App\Region::create($region);
        }
    }
}
