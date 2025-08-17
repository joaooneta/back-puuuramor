<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateParceiros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'nome'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'link'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'logo'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('parceiros');
    }

    public function down()
    {
        $this->forge->dropTable("parceiros");
    }
}
