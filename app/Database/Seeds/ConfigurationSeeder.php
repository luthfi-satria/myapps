<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'ckey' => 'SITENAME',
                'name' => 'Site Name',
                'description' => 'Define website name',
                'cval' => 'MyApps'
            ],
            [
                'id' => 2,
                'ckey' => 'METATITLE',
                'name' => 'Meta Title',
                'description' => 'Define website title',
                'cval' => 'MICROAPPS'
            ],
            [
                'id' => 3,
                'ckey' => 'METADESC',
                'name' => 'Meta Description',
                'description' => 'Define website description',
                'cval' => 'Base CMS with codeigniter 4'
            ],

        ];
        return $this->db->table('configuration')->upsertBatch($data);
    }
}
