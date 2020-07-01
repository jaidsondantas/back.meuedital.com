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
                'created_by' => 1
            ],
            [
                'name' => 'IADES',
                'created_by' => 1
            ],
            [
                'name' => 'Quadrix',
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new ExaminationBoard())) {
            ExaminationBoard::insert($entity);
        }
    }
}
