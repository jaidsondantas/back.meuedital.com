<?php

use Illuminate\Database\Seeder;

class AutoPartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auto_parts')->insert([
            'full_name' => 'Auto Peças Duarte',
            'email' => 'autopeca@gmail.com',
            'phone' => '(61) 99844-5511',
            'delivery_service' => true,
            'status' => true,
            'type_person_id' => 2,
            'representative_id' => null,
            'specialty_id' => 1,
            'created_by' => 1
        ]);
    }
}
