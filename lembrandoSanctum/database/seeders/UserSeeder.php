<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add user
        
        $user = new User();
        $user->name = "AppConsumer001";
        $user->email = "appConsume@teste.com";
        $user->password = bcrypt('Abc1234');
        $user->save();

    }
}
