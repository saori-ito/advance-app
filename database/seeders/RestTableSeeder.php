<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Time;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Factory;
use DB;


class RestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();
        Time::unguard();
        Rest::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        Time::truncate();
        Rest::truncate();

        Rest::factory()->count(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::reguard();
        Time::reguard();
        Rest::reguard();
    }
}
