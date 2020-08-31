<?php

use App\Models\Content;
use App\Models\Country;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
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
                    'name' => 'Brasil',
                    'initials'     => 'BR',
                    'createdBy' => 1
                ]
            ];


            if (!QueryService::ifExistsData(new Country())) {
                Country::insert($entity);
            }
    }
}
