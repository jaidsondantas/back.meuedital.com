<?php

use Database\Seeds\CommonSeeder;

class TypePeopleSeeder extends CommonSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_people')->insert([
            'name' => 'Pessoa Física',
            'initials' => 'PF',
            'created_at' => $this->timestamp,
            'created_by' => 1
        ]);
        DB::table('type_people')->insert([
            'name' => 'Pessoa Juridica',
            'initials' => 'PJ',
            'created_at' => $this->timestamp,
            'created_by' => 1
        ]);
    }
}
