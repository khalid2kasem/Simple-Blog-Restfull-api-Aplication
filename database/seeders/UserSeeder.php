<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
        ]);
        // this will change everytime which makes Postman request not work
        // $token = $user->createToken('test_user_token')->plainTextToken;

        // Instead we will use a known token
        //
        // plainTextToken: 1|Q5cVXz3WvCNUfjx5VclrGeeZ3tvWEPYXD7GYLYfKabe3dfe4  
        // plainTextToken without id - works the same: Q5cVXz3WvCNUfjx5VclrGeeZ3tvWEPYXD7GYLYfKabe3dfe4  
        // hashedToken: 
        DB::table('personal_access_tokens')->insert([
            'id' => 1,
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => 1,
            'name' => 'test_user_token',
            'token' => '852041edcb1ac3bfb49805deb98bd47d3be64f35fa6996da1ca1f2cdea6320ca',
            'abilities' => '["*"]',
            'last_used_at' => null,
            'expires_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
