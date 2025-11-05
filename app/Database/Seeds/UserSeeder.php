<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $now = Time::now();

        $data = [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password_hash' => password_hash('adminpass', PASSWORD_DEFAULT),
            'role' => 'admin',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // Using query builder for insertion here because seeder runs once
        $this->db->table('users')->insert($data);
    }
}
