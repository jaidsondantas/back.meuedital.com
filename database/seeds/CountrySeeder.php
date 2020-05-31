<?php

use App\Models\Country;
use App\Services\Models\QueryServiceModel;
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
        if(!QueryServiceModel::ifExistsData(new Country())){

            Country::create([
                'name'      => 'Brasil',
                'initials'     => 'BR',
                'created_by'  => 1,
            ]);

        }
    }
}
