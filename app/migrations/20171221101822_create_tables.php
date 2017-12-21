<?php

use Illuminate\Database\Schema\Blueprint;
use App\migrations\Migration;

/**
 * Create Tables
 */
class CreateTables extends Migration
{

    public function up()
    {

        $this->schema->create('slugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 16)->index();
            $table->string('long_url', 255);
        });
    }

    public function down()
    {
        $this->schema->drop('security_settings');
    }
}
