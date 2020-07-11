<?php

use App\Models\TypeKnowledge;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class TypeKnowledgeSeeder extends Seeder
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
                'name' => 'Conhecimentos Básicos',
                'created_by' => 1
            ],
            [
                'name' => 'Conhecimentos Especificos',
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new TypeKnowledge())) {
            TypeKnowledge::insert($entity);
        }
    }
}
