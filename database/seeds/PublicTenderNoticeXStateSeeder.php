<?php

use App\Models\PublicTenderNoticeXState;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class PublicTenderNoticeXStateSeeder extends Seeder
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
                'state_id' => 1,
                'public_tender_notice_id' => 1,
                'created_by' => 1,
            ],
            [
                'state_id' => 2,
                'public_tender_notice_id' => 1,
                'created_by' => 1,
            ],
            [
                'state_id' => 1,
                'public_tender_notice_id' => 2,
                'created_by' => 1,
            ],
            [
                'state_id' => 2,
                'public_tender_notice_id' => 2,
                'created_by' => 1,
            ],
            [
                'state_id' => 3,
                'public_tender_notice_id' => 2,
                'created_by' => 1,
            ],
        ];

        if (!QueryService::ifExistsData(new PublicTenderNoticeXState())) {
            PublicTenderNoticeXState::insert($entity);
        }
    }
}
