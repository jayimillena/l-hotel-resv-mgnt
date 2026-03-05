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
        $accounts = [
            [
                'name' => 'Lozada',
                'email' => 'lozada@gmail.com',
                'password' =>  Hash::make('adminpass9'),
                'user_type' => 'admin',
            ],
            [
                'name' => 'Rezari',
                'email' => 'rezari@gmail.com',
                'password' =>  Hash::make('adminpass9'),
                'user_type' => 'staff',
            ]

        ];

        \App\Models\User::insert($accounts);

        $names = [
            'Veranda Rooms', 'Standard Rooms', 'Junior Suite',
            'Single Room', 'Triple Occupancy', 'Coco Melon'
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
