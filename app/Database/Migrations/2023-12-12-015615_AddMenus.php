<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddMenus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                "type" => "INT",
                "constraint" => 11,
                "auto_increment" => true
            ],
            'parent_id' => [
                "type" => "INT",
                "constraint" => 11,
                "null" => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
                'null' => false,
            ],
            'label' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'route_url' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'sequence' => [
                'type' => 'INT',
                'constraint' => 2,
                'default' => 1
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'default' => 'fa fa-home'
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);
        $this->forge->addField('updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus', true);

    }

    public function down()
    {
        $this->forge->dropTable('menus', true);
    }
}
