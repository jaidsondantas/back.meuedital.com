<?php

use Illuminate\Database\Seeder;

class CategoryProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_products')->insert([
            'name' => 'Suspensões',
            'created_by' => 1
        ]);
        DB::table('category_products')->insert([
            'name' => 'Escapamentos',
            'created_by' => 1
        ]);
    }
}
