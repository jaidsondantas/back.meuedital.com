<?php

use App\Models\StatusPublicTenderNotice;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class StatusPublicTenderNoticeSeeder extends Seeder
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
                'name' => 'Publicado',
                'created_by' => 1
            ],
            [
                'name' => 'Eminente',
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new StatusPublicTenderNotice())) {
            StatusPublicTenderNotice::insert($entity);
        }
    }
}
