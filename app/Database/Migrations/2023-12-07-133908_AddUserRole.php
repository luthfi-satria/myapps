<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUserRole extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'usergroup_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
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
        $this->forge->addKey('id', true);
        $this->forge->addField('updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->forge->addForeignKey('group_id','group','id','CASCADE','CASCADE','userrole_group_fk');
        $this->forge->addForeignKey('usergroup_id','usergroup','id','CASCADE','CASCADE','userrole_usergroup_fk');
        $this->forge->addKey(['deleted_at'],false, false, 'userrole_del_IDX');
        $this->forge->createTable('user_role', true);
    }

    public function down()
    {
        $this->forge->dropTable('user_role');
    }
}
