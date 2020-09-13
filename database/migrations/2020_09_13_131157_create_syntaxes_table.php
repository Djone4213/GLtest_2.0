<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyntaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syntaxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_name')->nullable();;
            $table->string('caption');
            $table->timestamps();
        });

        DB::table('syntaxes')->insert(
        array(
            'code_name' => null,
            'caption' => 'Без синтаксиса'
          )
        );

        DB::table('syntaxes')->insert(
        array(
            'code_name' => 'language-php',
            'caption' => 'PHP'
          )
        );

        DB::table('syntaxes')->insert(
        array(
            'code_name' => 'language-html',
            'caption' => 'HTML'
          )
        );

        DB::table('syntaxes')->insert(
        array(
            'code_name' => 'language-javascript',
            'caption' => 'JavaScript'
          )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syntaxes');
    }
}
