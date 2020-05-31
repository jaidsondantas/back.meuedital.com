<?php

use Illuminate\Database\Seeder;

class CarModelProductYearDefaultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_model_x_product_year_defaults')->insert([
            'car_model_id' => 1,
            'product_default_id' => 1,
            'year' => '2019',
            'created_by' => 1
        ]);

        DB::table('car_model_x_product_year_defaults')->insert([
            'car_model_id' => 1,
            'product_default_id' => 1,
            'year' => '2018',
            'created_by' => 1
        ]);

        DB::table('car_model_x_product_year_defaults')->insert([
            'car_model_id' => 1,
            'product_default_id' => 1,
            'year' => '2017',
            'created_by' => 1
        ]);
    }
}
