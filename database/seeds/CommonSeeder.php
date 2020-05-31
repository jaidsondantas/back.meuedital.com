<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommonSeeder extends Seeder
{
    public $timestamp;

    public function __construct()
    {
        $this->timestamp = Carbon::now();
    }
}
