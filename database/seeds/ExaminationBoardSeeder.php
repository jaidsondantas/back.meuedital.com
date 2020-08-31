<?php

use App\Models\ExaminationBoard;
use App\Models\State;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class ExaminationBoardSeeder extends Seeder
{
    public function run()
    {
        $entity = [
            [
                'name' => 'CESP',
                'createdBy' => 1
            ],
            [
                'name' => 'IADES',
                'createdBy' => 1
            ],
            [
                'name' => 'Quadrix',
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new ExaminationBoard())) {
            ExaminationBoard::insert($entity);
        }
    }
}
