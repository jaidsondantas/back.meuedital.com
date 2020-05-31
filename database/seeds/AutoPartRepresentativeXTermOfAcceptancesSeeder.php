<?php

use Illuminate\Database\Seeder;

class AutoPartRepresentativeXTermOfAcceptancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representative_x_term_of_acceptances')->insert([
            'representative_id' => 1,
            'term_of_acceptance_id' => 1,
            'status' => true,
            'created_by' => 1
        ]);
    }
}
