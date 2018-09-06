<?php

use Illuminate\Database\Seeder;

class InstallCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->delete();
        DB::table('users')->insert([
            ['user_id' => 10486, 'username' => 'test', 'name' => 'test', 'mobile' => 17100000000, 'mobile_validated' => 1, 'api_token' => '95b27524318242f40d48f9611cef120f00b4af96289278c19c10b866246bdb27']
        ]);

        DB::table('contacts')->delete();
        DB::table('contacts')->insert([
            ['contact_id' => '2304', 'corp_id' => 1574, 'user_id' => 10486, 'code' => '18631324', 'name' => 'test', 'mobile' => '17100000000', 'is_admin' => 1]
        ]);

        DB::table('corporations')->delete();
        DB::table('corporations')->insert([
            ['corp_id' => 1574, 'code' => '21015153', 'name' => 'test_corp（仅用于测试及API调用）', 'user_id' => '10486', 'role_id' => '1713']
        ]);

        DB::table('corporation_permanent_codes')->delete();
        DB::table('corporation_permanent_codes')->insert([
            ['corp_id' => 1574, 'agent_id' => '10009', 'name' => 'test', 'permanent_code' => '4c7HHMf1Zrk5OncrY86sf0ziVe0nqrTr']
        ]);
    }
}
