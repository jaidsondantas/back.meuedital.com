<?php

use App\Models\Content;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
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
                'name' => 'Lei Organica do DF',
                'categoryContent' => 1,
                'createdBy' => 1
            ],
            [
                'name' => 'Substantivo',
                'categoryContent' => 2,
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new Content())) {
            Content::insert($entity);
        }
    }
}
