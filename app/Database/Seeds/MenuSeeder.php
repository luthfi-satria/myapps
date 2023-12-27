<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = SELF::seederData();
        $this->db->table('menus')->upsertBatch($data);
    }

    static function seederData(){
        return [
            [
                'id' => 1,
                'parent_id' => null,
                'name' => 'settings',
                'label' => 'settings',
                'route_url' => 'settings',
                'sequence' => 1,
                'icon' => 'cogs',
                'is_active' => 1,
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'name' => 'configuration',
                'label' => 'configuration',
                'route_url' => 'configuration',
                'sequence' => 1,
                'icon' => 'wrench',
                'is_active' => 1,
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'name' => 'usergroup',
                'label' => 'usergroup',
                'route_url' => 'usergroup',
                'sequence' => 2,
                'icon' => 'users',
                'is_active' => 1,
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'name' => 'roles',
                'label' => 'usergroup roles',
                'route_url' => 'roles',
                'sequence' => 3,
                'icon' => 'sync-alt',
                'is_active' => 1,
            ],
            [
                'id' => 5,
                'parent_id' => null,
                'name' => 'users',
                'label' => 'users',
                'route_url' => 'users',
                'sequence' => 2,
                'icon' => 'users',
                'is_active' => 1,
            ],
        ];
    }
}
