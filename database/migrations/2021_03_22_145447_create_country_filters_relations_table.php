<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryFiltersRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_filters_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('filter_id');

            $table->foreign('item_id', 'fk_item_countryFilter')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('filter_id', 'fk_countryFilter_item')
                ->references('id')
                ->on('country_filters')
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
        Schema::table('country_filters_relations', function (Blueprint $table) {
            $table->dropForeign('fk_item_countryFilter');
            $table->dropForeign('fk_countryFilter_item');
        });

        Schema::dropIfExists('country_filters_relations');
    }
}
