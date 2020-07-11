<?php

use App\Models\Office;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class OfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = [
            [
                'name' => 'Fiscal',
                'created_by' => 1
            ],
            [
                'name' => 'Agente Penitenciário',
                'created_by' => 1
            ],
            [
                'name' => 'Agente de Rua',
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new Office())) {
            Office::insert($entity);
        }
    }
}
