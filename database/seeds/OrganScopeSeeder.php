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
                'createdBy' => 1
            ],
            [
                'name' => 'Estadual',
                'createdBy' => 1
            ],
            [
                'name' => 'Municipal',
                'createdBy' => 1
            ],
        ];

        if (!QueryService::ifExistsData(new OrganScope())) {
            OrganScope::insert($entity);
        }
    }
}
