<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
           'phone_num' => '+90 850 840 6440',
            'email' => 'info@prodrom.com',
            'address' => 'Fırat Teknokent - Teknoloji Geliştirme Bölgesi - Elazığ/Türkiye',
            'lat' => '38.68213',
            'lng' => '39.17709'

        ]);
    }
}
