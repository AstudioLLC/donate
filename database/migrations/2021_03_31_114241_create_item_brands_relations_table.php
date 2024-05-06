<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemBrandsRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_brands_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->index();
            $table->unsignedBigInteger('brand_id')->index();

            $table->foreign('item_id', 'fk_item')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
            $table->foreign('brand_id', 'fk_brand')
                ->references('id')
                ->on('brands')
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
        Schema::table('item_brands_relations', function (Blueprint $table) {
            $table->dropForeign('fk_item');
            $table->dropForeign('fk_brand');
        });

        Schema::dropIfExists('item_brands_relations');
    }
}
