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
            ['name' => 'region1'],
            ['name' => 'region2'],
        ];
        foreach ($regions as $region){
            \App\Region::create($region);
        }
    }
}
