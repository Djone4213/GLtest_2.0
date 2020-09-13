<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpirationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('expirations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('term');
          $table->char('type_term', 1)->nullable();;
          $table->timestamps();
      });

      DB::table('expirations')->insert(
      array(
          'name' => 'Без ограничений',
          'term' => 0,
          'type_term' => null
        )
      );

      DB::table('expirations')->insert(
      array(
          'name' => '10 мин',
          'term' => 10,
          'type_term' => 'm'
        )
      );

      DB::table('expirations')->insert(
      array(
          'name' => '1 час',
          'term' => 1,
          'type_term' => 'H'
        )
      );

      DB::table('expirations')->insert(
      array(
          'name' => '3 часа',
          'term' => 3,
          'type_term' => 'H'
        )
      );

      DB::table('expirations')->insert(
      array(
          'name' => '1 день',
          'term' => 1,
          'type_term' => 'D'
        )
      );

      DB::table('expirations')->insert(
      array(
          'name' => '1 неделя',
          'term' => 1,
          'type_term' => 'W'
        )
      );

      DB::table('expirations')->insert(
      array(
          'name' => '1 месяц',
          'term' => 1,
          'type_term' => 'M'
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
        Schema::dropIfExists('expirations');
    }
}
