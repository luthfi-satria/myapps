<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddMenusModule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'desc' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'controller' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'method_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'permissions' => [
                'type' => 'ENUM',
                'constraint' => ['view','insert','update','delete','download'],
                'default' => 'view',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
        ]);
        $this->forge->addField('updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->forge->addForeignKey('menu_id','menus','id','CASCADE','CASCADE','menumodule_menus_fk');
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus_module', true);
    }

    public function down()
    {
        $this->forge->dropTable('menus_module', true);
    }
}
