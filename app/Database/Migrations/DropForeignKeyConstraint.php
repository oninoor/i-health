<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropForeignKeyConstraint extends Migration
{
    public function up()
    {
        $this->db->query('ALTER TABLE consultations DROP FOREIGN KEY consultation_id');
    }

    public function down()
    {
        // not needed for this example
    }
}
