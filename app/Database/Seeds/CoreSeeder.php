<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CoreSeeder extends Seeder
{
    public function run()
    {
        $this->call('GroupSeeder');
        $this->call('UsergroupSeeder');
        $this->call('UserroleSeeder');
        $this->call('UserSeeder');
        $this->call('MenuSeeder');
        $this->call('MenusModuleSeeder');
    }
}
