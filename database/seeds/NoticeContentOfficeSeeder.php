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
                'notice_content_id' => 1,
                'office_id' => 1,
                'created_by' => 1
            ],
            [
                'notice_content_id' => 2,
                'office_id' => 1,
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new NoticeContentOffice())) {
            NoticeContentOffice::insert($entity);
        }
    }
}
