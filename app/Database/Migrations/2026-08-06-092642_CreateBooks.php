<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBooks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'publisher' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'year' => [
                'type'       => 'INT',
                'constraint' => 4,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'isbn' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'synopsis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
