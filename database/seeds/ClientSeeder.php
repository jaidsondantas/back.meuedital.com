<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'full_name' => 'Jaidson Dantas',
            'date_birth' => Carbon::now()->subYears(30),
            'email' => 'jaidsondantas@gmail.com',
            'phone' => '(61) 99858-0396',
            'status' => 1,
            'created_by' => 1,
            'document_main' => '2781390',
            'document_secondary' => '034.277.481-62',
            'type_person_id' => 1
        ]);
    }
}
