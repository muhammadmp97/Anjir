<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('book_properties', function (Blueprint $table) {
            $table->id();
            $table->string('property');
            $table->string('value');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_properties');
    }
}
