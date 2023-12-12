<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserroleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'group_id' => 2,
                'usergroup_id' => 1,
            ],
        ];

        $this->db->table('user_role')->upsertBatch($data);
    }
}
