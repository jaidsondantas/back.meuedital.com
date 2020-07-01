<?php

use App\Models\TermOfAcceptance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(ExaminationBoardSeeder::class);
        $this->call(OrganScopeSeeder::class);
        $this->call(TypeOrganSeeder::class);
        $this->call(OrganSeeder::class);
        $this->call(StatusPublicTenderNoticeSeeder::class);
        $this->call(PublicTenderNoticeSeeder::class);
        $this->call(EducationLevelSeeder::class);
        $this->call(PublicTenderNoticeEducationLevelSeeder::class);
        $this->call(PublicTenderNoticeXStateSeeder::class);
    }
}
