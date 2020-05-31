<?php

use Illuminate\Database\Seeder;

class CarModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_models')->insert([
            'name' => 'Hillux',
            'assembler_car_id' => 1,
            'created_by' => 1
        ]);

        DB::table('car_models')->insert([
            'name' => 'Corsa Wind',
            'assembler_car_id' => 2,
            'created_by' => 1
        ]);
    }
}
