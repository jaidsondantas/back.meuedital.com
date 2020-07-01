<?php

use App\Models\PublicTenderNoticeXEducationLevel;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class PublicTenderNoticeEducationLevelSeeder extends Seeder
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
                'education_level_id' => 1,
                'public_tender_notice_id' => 1,
                'created_by' => 1,
            ],
            [
                'education_level_id' => 2,
                'public_tender_notice_id' => 1,
                'created_by' => 1,
            ],
            [
                'education_level_id' => 1,
                'public_tender_notice_id' => 2,
                'created_by' => 1,
            ],
            [
                'education_level_id' => 2,
                'public_tender_notice_id' => 2,
                'created_by' => 1,
            ],
            [
                'education_level_id' => 3,
                'public_tender_notice_id' => 2,
                'created_by' => 1,
            ],
        ];

        if (!QueryService::ifExistsData(new PublicTenderNoticeXEducationLevel())) {
            PublicTenderNoticeXEducationLevel::insert($entity);
        }
    }
}
