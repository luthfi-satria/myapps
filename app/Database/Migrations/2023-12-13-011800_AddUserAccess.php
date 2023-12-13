<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUserAccess extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'permissions_set' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'view,insert,update,delete,download',
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
        $this->forge->addForeignKey('role_id','user_role','id','CASCADE','CASCADE','useraccess_userrole_fk');
        $this->forge->addForeignKey('menu_id','menus','id','CASCADE','CASCADE','useraccess_menus_fk');
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_access', true);
    }

    public function down()
    {
        $this->forge->dropTable('user_access');
    }
}
