<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductDefaultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_defaults')->insert([
            'bar_code' => '78911561464',
            'name' => 'Bobina',
            'description' => 'Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis',
            'brand' => 'Master',
            'application' => 'Corsa, Voyager, Teste',
            'others_details' => '',
            'category_product_id' => 1,
            'created_by' => 1
        ]);

    }
}
