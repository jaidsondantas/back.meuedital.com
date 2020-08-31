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
                'state' => 1,
                'publicTenderNotice' => 1,
                'createdBy' => 1,
            ],
            [
                'state' => 2,
                'publicTenderNotice' => 1,
                'createdBy' => 1,
            ],
            [
                'state' => 1,
                'publicTenderNotice' => 2,
                'createdBy' => 1,
            ],
            [
                'state' => 2,
                'publicTenderNotice' => 2,
                'createdBy' => 1,
            ],
            [
                'state' => 3,
                'publicTenderNotice' => 2,
                'createdBy' => 1,
            ],
        ];

        if (!QueryService::ifExistsData(new PublicTenderNoticeXState())) {
            PublicTenderNoticeXState::insert($entity);
        }
    }
}
