<?php

use App\Models\NoticeContent;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class NoticeContentsSeeder extends Seeder
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
                'publicTenderNotice' => 1,
                'typeKnowledge' => 1,
                'content' => 1,
                'createdBy' => 1
            ],
            [
                'publicTenderNotice' => 1,
                'typeKnowledge' => 1,
                'content' => 2,
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new NoticeContent())) {
            NoticeContent::insert($entity);
        }
    }
}
