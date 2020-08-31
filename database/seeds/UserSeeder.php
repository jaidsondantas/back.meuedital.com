<?php

use App\Models\Country;
use App\Services\QueryService;
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
        if (!QueryService::ifExistsData(new User())) {
            User::create([
                'name' => 'Super Admin',
                'firebaseUid' => '',
                'email' => 'admin@admin.com',
            ]);
        }
    }
}
