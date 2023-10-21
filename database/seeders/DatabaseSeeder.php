<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'nrp' => '11500000',
                'password' => Hash::make('HMIF2023'),
                'roles' => 'ADMIN'

            ],
            [
                'name' => 'testing',
                'email' => 'testing@gmail.com',
                'nrp' => '11500000',
                'password' => Hash::make('HMIF2023'),
                'roles' => 'USER'
            ]
        ]);

        // DB::table('transactions')->insert([
        //     [
        //         'user_id' => 6,
        //         'food_id' => 2,
        //         'quantity' => 1,
        //         'total' => 100,
        //         'status' => 'ON_DELIVERY',
        //         'payment_type' => 'LUNAS',
        //         'payment_url' => 'https://www.google.com/?hl=id'
        //     ]
        // ]);
    }
}
