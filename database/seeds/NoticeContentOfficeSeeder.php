<?php

use App\Models\NoticeContentOffice;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class NoticeContentOfficeSeeder extends Seeder
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
                'noticeContent' => 1,
                'office' => 1,
                'createdBy' => 1
            ],
            [
                'noticeContent' => 2,
                'office' => 1,
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new NoticeContentOffice())) {
            NoticeContentOffice::insert($entity);
        }
    }
}
