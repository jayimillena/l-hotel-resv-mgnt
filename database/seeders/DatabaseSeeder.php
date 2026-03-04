<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Lozada',
            'email' => 'lozada@gmail.com',
            'password' =>  Hash::make('adminpass9'),
            'user_type' => 'admin',
        ]);

        $names = [
            'Deluxe Suite 101', 'Deluxe Suite 102', 'Deluxe Suite 103',
            'Standard Room 201', 'Standard Room 202', 'Standard Room 203', 'Standard Room 204', 'Standard Room 205', 'Standard Room 206', 'Standard Room 207',
            'Economy 301', 'Economy 302', 'Economy 303', 'Economy 304', 'Economy 305', 'Economy 306', 'Economy 307',
            'Platinum 401', 'Platinum 402', 'Platinum 403',
            'VIP 501', 'VIP 502',
            'Elite 601', 'Elite 602', 'Elite 603',
            'Emerald 701', 'Diamond 801', 'Gold VIP 901',
        ];

        $rooms = array_map(function ($name) {
            return [
                'name' => $name,
                'availability' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $names);

        \App\Models\Room::insert($rooms);
    }
}
