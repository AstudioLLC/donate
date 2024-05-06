<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorFiltersRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_filters_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('filter_id');

            $table->foreign('item_id', 'fk_item_colorFilter')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('filter_id', 'fk_colorFilter_item')
                ->references('id')
                ->on('color_filters')
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
        Schema::table('color_filters_relations', function (Blueprint $table) {
            $table->dropForeign('fk_item_colorFilter');
            $table->dropForeign('fk_colorFilter_item');
        });

        Schema::dropIfExists('color_filters_relations');
    }
}
