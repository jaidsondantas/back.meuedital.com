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
                'public_tender_notice_id' => 1,
                'type_knowledge_id' => 1,
                'content_id' => 1,
                'created_by' => 1
            ],
            [
                'public_tender_notice_id' => 1,
                'type_knowledge_id' => 1,
                'content_id' => 2,
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new NoticeContent())) {
            NoticeContent::insert($entity);
        }
    }
}
