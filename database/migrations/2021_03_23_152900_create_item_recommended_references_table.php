<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRecommendedReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_recommended_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->index();
            $table->unsignedBigInteger('recommended_id')->index();

            $table->foreign('item_id', 'fk_item_recommended')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('recommended_id', 'fk_recommended_item')
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
        Schema::table('item_recommended_references', function (Blueprint $table) {
            $table->dropForeign('fk_item_recommended');
            $table->dropForeign('fk_recommended_item');
        });

        Schema::dropIfExists('item_recommended_references');
    }
}
