<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $defaultUser = new User();
        $defaultUser->name = 'Сергей';
        $defaultUser->email = 'diablo_xxx@mail.ru';
        $defaultUser->role = 'admin';
        $defaultUser->password = 'admin';
        $defaultUser->save();
    }
}
