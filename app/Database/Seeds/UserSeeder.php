<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'role_id' => 1,
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'phone' => '123456789',
                'email' => 'admin@mail.com',
                'password' => password_hash('admin_demo', PASSWORD_DEFAULT),
            ]
        ];

        $this->db->table('users')->upsertBatch($data);
    }
}
