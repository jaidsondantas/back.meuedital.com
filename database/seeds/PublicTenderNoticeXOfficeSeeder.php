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
                'office' => 1,
                'publicTenderNotice' => 1,
                'averageSalary' => 4540.40,
                'amount' => 100,
                'createdBy' => 1,
            ],
            [
                'office' => 2,
                'publicTenderNotice' => 1,
                'averageSalary' => 4540.40,
                'amount' => 100,
                'createdBy' => 1,
            ],
        ];

        if (!QueryService::ifExistsData(new PublicTenderNoticeXOffice())) {
            PublicTenderNoticeXOffice::insert($entity);
        }
    }
}
