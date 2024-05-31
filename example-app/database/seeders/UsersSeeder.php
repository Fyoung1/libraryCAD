<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //Добавление в бд админа
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'username' => 'admin',
                'email' => 'admin@123.ru',
                'password' => bcrypt(1234),
                'role'=>'admin'
            ],
        ]);
    }
}
