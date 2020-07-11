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
                'category_content_id' => 1,
                'created_by' => 1
            ],
            [
                'name' => 'Substantivo',
                'category_content_id' => 2,
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new Content())) {
            Content::insert($entity);
        }
    }
}
