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
        $this->call(TypePeopleSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(SpecialtiesSeeder::class);
        $this->call(AutoPartsSeeder::class);
        $this->call(AddressesSeeder::class);
        $this->call(CategoryProductsSeeder::class);
        $this->call(AssemblerCarsSeeder::class);
        $this->call(CarModelsSeeder::class);
        $this->call(ProductDefaultsSeeder::class);
        $this->call(TermOfAcceptancesSeeder::class);
        $this->call(RepresentativesSeeder::class);
        $this->call(AutoPartRepresentativeXTermOfAcceptancesSeeder::class);
        $this->call(TypeMethodsSeeder::class);
        $this->call(PaymentMethodsAcceptedSeeder::class);
    }
}
