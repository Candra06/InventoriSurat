<?php

use App\General;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        General::create([
            'logo' => '',
            'title' => 'INVENTORI SURAT',
            'tagline' => 'Site Tagline',
        ]);
    }
}
