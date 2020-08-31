<?php

use App\Models\EducationLevel;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
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
                'name' => 'Superior',
                'createdBy' => 1
            ],
            [
                'name' => 'Fundamental',
                'createdBy' => 1
            ],
            [
                'name' => 'Médio',
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new EducationLevel())) {
            EducationLevel::insert($entity);
        }
    }
}
