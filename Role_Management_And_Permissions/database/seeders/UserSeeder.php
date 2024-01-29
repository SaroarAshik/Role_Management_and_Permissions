<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder{

    public function run(): void{
        $user = User::where('email', 'manirujjamanakash@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Maniruzzaman Akash";
            $user->email = "manirujjamanakash@gmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}