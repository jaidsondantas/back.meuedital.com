<?php

use Illuminate\Database\Seeder;

class RepresentativesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representatives')->insert([
            'name' => 'Fulano de Tal de Sousa',
            'cpf' => '123.144.144-62',
            'doc' => '27816222',
            'issuing_organ' => 'SSP',
            'email' => 'fulanodetal@gmail.com',
            'phone' => '(61) 99999-9999',
            'created_by' => 1
        ]);
    }
}
