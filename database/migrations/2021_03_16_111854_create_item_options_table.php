<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('item_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->index();
            $table->json('name');
            $table->json('value');

            $table->foreign('item_id', 'fk_item_options')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_options', function (Blueprint $table) {
            $table->dropForeign('fk_item_options');
        });

        Schema::dropIfExists('item_options');
    }
}
