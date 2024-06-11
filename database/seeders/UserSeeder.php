<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'React avec laravel',
                'email' => 'reactaveclaravel@react.com',
                'email_verified_at' => now(),
                'password' => Hash::make('reactlaravel')
            ],
        ];

        foreach ($users as $user) {
            $email = $user['email'];
            
            User::updateOrCreate(
                ['email' => $email], 
                $user
            );
        }
    }
}
