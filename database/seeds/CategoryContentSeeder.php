<?php

use App\Models\CategoryContent;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class CategoryContentSeeder extends Seeder
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
                'name' => 'LEGISLATIVO',
                'created_by' => 1
            ],
            [
                'name' => 'LINGUA PORTUGUESA',
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new CategoryContent())) {
            CategoryContent::insert($entity);
        }
    }
}
