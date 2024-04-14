<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Package;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ismail Hossain',
            'email' => 'ismail@email.com',
            'password' => bcrypt('123456789'),
        ]);

        Feature::create([
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_light_color_272x92dp.png',
            'route_name' => 'feature1.index',
            'name' => 'BMI Calculator',
            'description' => 'Calculate BMI index according to the information',
            'required_credits' => 1,
            'active' => true,
        ]);

        Feature::create([
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_light_color_272x92dp.png',
            'route_name' => 'feature1.index',
            'name' => 'PPI Calculator',
            'description' => 'Calculate PPI according to the information',
            'required_credits' => 4,
            'active' => true,
        ]);

        Package::create([
            'name' => 'Basic',
            'price' => '5',
            'credits' => 20
        ]);
        Package::create([
            'name' => 'Silver',
            'price' => '20',
            'credits' => 100
        ]);
        Package::create([
            'name' => 'Golden',
            'price' => '50',
            'credits' => 500
        ]);
    }
}
