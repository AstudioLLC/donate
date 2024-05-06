<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFilterRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_filter_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('filter_id')->index();

            $table->foreign('category_id', 'fk_category_filter')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('filter_id', 'fk_filter_category')
                ->references('id')
                ->on('filters')
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
        Schema::table('category_filter_relations', function (Blueprint $table) {
            $table->dropForeign('fk_category_filter');
            $table->dropForeign('fk_filter_category');
        });

        Schema::dropIfExists('category_filter_relations');
    }
}
