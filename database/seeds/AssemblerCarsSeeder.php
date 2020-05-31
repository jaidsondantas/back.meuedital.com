<?php

use Illuminate\Database\Seeder;

class AssemblerCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assembler_cars')->insert([
            'name' => 'Toyota',
            'created_by' => 1
        ]);
        DB::table('assembler_cars')->insert([
            'name' => 'Chevrolet',
            'created_by' => 1
        ]);
    }
}
