<?php

use App\Models\Organ;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class OrganSeeder extends Seeder
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
                'name' => 'Polícia Cívil do DF',
                'description' => 'Descrição do orgão',
                'image' => 'https://projeto-cdn.infra.grancursosonline.com.br/thumbnail-carrossel/pcdf.jpg',
                'typeOrgan' => 1,
                'organScope' => 1,
                'createdBy' => 1
            ],
            [
                'name' => 'Polícia Federal',
                'description' => 'Descrição do orgão',
                'image' => 'https://projeto-cdn.infra.grancursosonline.com.br/thumbnail-carrossel/pf.jpg',
                'typeOrgan' => 1,
                'organScope' => 1,
                'createdBy' => 1
            ],

        ];

        if (!QueryService::ifExistsData(new Organ())) {
            Organ::insert($entity);
        }
    }
}
