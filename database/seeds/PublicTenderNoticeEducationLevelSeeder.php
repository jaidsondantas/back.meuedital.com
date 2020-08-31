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
                'educationLevel' => 1,
                'publicTenderNotice' => 1,
                'createdBy' => 1,
            ],
            [
                'educationLevel' => 2,
                'publicTenderNotice' => 1,
                'createdBy' => 1,
            ],
            [
                'educationLevel' => 1,
                'publicTenderNotice' => 2,
                'createdBy' => 1,
            ],
            [
                'educationLevel' => 2,
                'publicTenderNotice' => 2,
                'createdBy' => 1,
            ],
            [
                'educationLevel' => 3,
                'publicTenderNotice' => 2,
                'createdBy' => 1,
            ],
        ];

        if (!QueryService::ifExistsData(new PublicTenderNoticeXEducationLevel())) {
            PublicTenderNoticeXEducationLevel::insert($entity);
        }
    }
}
