<?php

use App\Models\OrganScope;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class OrganScopeSeeder extends Seeder
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
                'name' => 'Federal',
                'created_by' => 1
            ],
            [
                'name' => 'Estadual',
                'created_by' => 1
            ],
            [
                'name' => 'Municipal',
                'created_by' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new OrganScope())) {
            OrganScope::insert($entity);
        }
    }
}
