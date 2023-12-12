<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsergroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'director'
            ],
            [
                'id' => 3,
                'name' => 'manager'
            ],
            [
                'id' => 4,
                'name' => 'spv'
            ],
            [
                'id' => 5,
                'name' => 'finance'
            ],
            [
                'id' => 6,
                'name' => 'operational'
            ],
            [
                'id' => 7,
                'name' => 'cashier'
            ],
        ];

        $this->db->table('usergroup')->upsertBatch($data);
    }
}
