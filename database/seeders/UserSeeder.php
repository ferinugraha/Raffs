<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'raffscoffemantap@gmail.com',
                'password' => bcrypt('adminraffsmantap'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasirraffscoffe@gmail.com',
                'password' => bcrypt('raffscoffemantap'),
                'role' => 'Kasir',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'User',
            ]
        ];
        User::insert($data);
    }
}
