<?php

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
        if(!QueryService::ifExistsData(new Country())){

            Country::create([
                'name'      => 'Brasil',
                'initials'     => 'BR',
                'created_by'  => 1,
            ]);

        }
    }
}
