<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'cep' => '72915582',
            'public_place' => 'Rua sem nome Quadra 24 Lote',
            'number' => '17C',
            'complement' => 'Sem',
            'neighborhood' => 'Mansões Olinda',
            'city' => 'Águas Lindas de Goiás',
            'state' => 'Goiás',
            'client_id' => 1,
            'auto_part_id' => 1,
            'created_by' => 1,
        ]);
    }
}
