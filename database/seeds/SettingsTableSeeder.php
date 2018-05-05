<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "laravel's Blog",
            'contact_number' => "+8801756307427",
            'contact_email' => "sanjib@r-cis.com",
            'address' => "Nawabpur, Dhaka-1100."
        ]);
    }
}
