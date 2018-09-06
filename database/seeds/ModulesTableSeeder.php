<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('modules')->delete();
        DB::table('modules')->insert([
            ['module' => 'homepage', 'title' => '首页'],
            ['module' => 'sell', 'title' => '供应']
        ]);
    }
}
