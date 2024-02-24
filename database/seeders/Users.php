<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@localhost.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
        ];

        foreach ($data as $key => $value) {
            \App\Models\User::create($value);
        }

        $this->command->info('User berhasil diinsert');
    }
}
