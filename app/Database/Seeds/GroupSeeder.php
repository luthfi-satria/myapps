<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'default'
            ],
            [
                'id' => 2,
                'name' => 'super'
            ],
            [
                'id' => 3,
                'name' => 'branch'
            ],
            [
                'id' => 4,
                'name' => 'store'
            ],
        ];

        $this->db->table('group')->upsertBatch($data);
    }
}
