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
                'createdBy' => 1
            ],
            [
                'name' => 'Agente Penitenciário',
                'createdBy' => 1
            ],
            [
                'name' => 'Agente de Rua',
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new Office())) {
            Office::insert($entity);
        }
    }
}
