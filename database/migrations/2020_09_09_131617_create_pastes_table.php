<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_expiration');
            $table->integer('id_user');
            $table->integer('id_syntax');
            $table->string('name');
            $table->tinyInteger('exposure');
            $table->text('paste');
            $table->char('url', 6);
            $table->dateTime('paste_live')->nullable();
            $table->timestamps();
            $table->index('id_expiration')
                ->references('id')
                ->on('expirations');
            $table->index('id_syntax')
                ->references('id')
                ->on('syntaxes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
}
