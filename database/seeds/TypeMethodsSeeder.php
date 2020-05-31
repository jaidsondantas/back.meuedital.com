<?php

use Illuminate\Database\Seeder;

class TypeMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_payment_methods')->insert([
            'name' => 'Dinheiro',
            'icon' => 'money',
            'status' => true,
            'created_by' => 1
        ]);
    }
}
