<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('collection_id')->nullable()->default(null);
            $table->unsignedBigInteger('author_id')->index()->nullable();
            $table->string('code')->unique()->nullable();
            $table->json('title');
            $table->text('alias');
            $table->json('short_description')->nullable();
            $table->json('description')->nullable();
            $table->double('price')->nullable();
            $table->double('bulk_price')->nullable();
            $table->double('discount')->nullable();
            $table->integer('count')->default(0);
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->unsignedInteger('ordering')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('is_new')->default(0);
            $table->boolean('is_promotion')->default(0);
            $table->json('params')->nullable();
            $table->json('unit_of_measurement')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('category_id', 'fk_item_category')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->foreign('collection_id', 'fk_item_collection')
                ->references('id')
                ->on('collections')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function(Blueprint $table) {
            $table->dropForeign('fk_item_category');
        });

        Schema::dropIfExists('items');
    }
}
