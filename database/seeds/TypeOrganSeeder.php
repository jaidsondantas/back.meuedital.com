<?php

use App\Models\TypeOrgan;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class TypeOrganSeeder extends Seeder
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
                'name' => 'Judiciario',
                'createdBy' => 1
            ],
            [
                'name' => 'Educação',
                'createdBy' => 1
            ],
            [
                'name' => 'Saúde',
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new TypeOrgan())) {
            TypeOrgan::insert($entity);
        }
    }
}
