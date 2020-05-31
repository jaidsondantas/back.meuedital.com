<?php

use Illuminate\Database\Seeder;

class ReceivingConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receiving_conditions')->insert([
            'name' => 'Padrão',
            'charge_percentage' => 4.5,
            'created_by' => 1
        ]);
    }
}
