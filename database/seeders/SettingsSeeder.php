<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'name' => 'system_name',
            'value' => 'The Kingfisher SLSU'
        ]);
        DB::table('settings')->insert([
            'id' => 2,
            'name' => 'favicon',
            'value' => ''
        ]);
        DB::table('settings')->insert([
            'id' => 3,
            'name' => 'web_logo',
            'value' => ''
        ]);
        DB::table('settings')->insert([
            'id' => 4,
            'name' => 'admin_logo',
            'value' => ''
        ]);
    }
}
