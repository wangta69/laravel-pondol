<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageMenus extends Migration
{
  public function up()
  {
    if (!Schema::hasTable('manage_menus')) {
      Schema::create('manage_menus', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('type', 20)->nullable();
        $table->string('title', 20)->nullable();
        $table->string('component', 50)->nullable();
        $table->tinyInteger('order')->default(0)->nullable();
        $table->tinyInteger('is_default')->default(1)->nullable();
        $table->unique(['type', 'title', 'deleted_at']); // ✅ 복합 유니크 제약 조건
        $table->timestamps(); 
        $table->softDeletes(); 
        
      });
    }

    DB::table('manage_menus')->updateOrInsert(
      ['type' => 'lnb', 'title'=>'pondol-common'],['component'=>'pondol-common::lnb-partial', 'order' => '99']
    );
  }

  public function down()
  {
    Schema::dropIfExists('manage_menus');
  }
}
