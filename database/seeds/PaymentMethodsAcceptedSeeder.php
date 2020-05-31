<?php

use Illuminate\Database\Seeder;

class PaymentMethodsAcceptedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods_accepted')->insert([
            'name' => 'Visa',
            'image' => './storage/images/visa.png',
            'status' => true,
            'type_payment_methods_id' => 1,
            'created_by' => 1
        ]);
    }
}
