<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ["username" => "admin",
            "password" => Hash::make("admin"),
            "role" => "admin",
            "status_active" => "active"],
            ["username" => "user",
            "password" => Hash::make("1234"),
            "role" => "admin",
            "status_active" => "active"],
        ];
        foreach ($users as $user) {
            \App\Models\User::create($user);
        }

    }
}
