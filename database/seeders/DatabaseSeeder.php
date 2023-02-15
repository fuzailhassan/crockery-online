<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(30)->create();
        \App\Models\User::factory(30)->create();


        // \App\Models\Order::factory()->create([

        //         'shipping_address' => fake()->text(50),
        //         'billing_address' => fake()->text(50)
        //     ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@crockery-online.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'isAdmin' => 1,

        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@crockery-online.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'isAdmin' => 0,

        // ]);
    }
}
