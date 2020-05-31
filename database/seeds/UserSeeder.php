<?php

use App\Models\Country;
use App\Services\Models\QueryServiceModel;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!QueryServiceModel::ifExistsData(new User())) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => '123',
                'remember_token' => '',
            ]);
        }
    }
}
