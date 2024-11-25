<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateJsonKeyValues extends Migration
{
/**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    if (!Schema::hasTable('json_key_values')) {
      Schema::create('json_key_values', function(BluePrint $table) {
        $table->id();
        $table->string('key')->index();
        $table->json('v');
      });
    }
  }


  public function down()
  {
    Schema::dropIfExists('json_key_values');
  }
}