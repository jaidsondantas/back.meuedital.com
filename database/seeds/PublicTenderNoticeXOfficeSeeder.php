<?php

use App\Models\PublicTenderNoticeXOffice;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class PublicTenderNoticeXOfficeSeeder extends Seeder
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
                'office_id' => 1,
                'public_tender_notice_id' => 1,
                'average_salary' => 4540.40,
                'amount' => 100,
                'created_by' => 1,
            ],
            [
                'office_id' => 2,
                'public_tender_notice_id' => 1,
                'average_salary' => 4540.40,
                'amount' => 100,
                'created_by' => 1,
            ],
        ];

        if (!QueryService::ifExistsData(new PublicTenderNoticeXOffice())) {
            PublicTenderNoticeXOffice::insert($entity);
        }
    }
}
