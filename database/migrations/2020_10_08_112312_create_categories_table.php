<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('parent_id')->nullable()->index()->default(null);
            $table->boolean('is_footer')->default(false);
            $table->boolean('is_home')->default(false);
            $table->tinyInteger('deep')->default(0);
            $table->text('alias');
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->unsignedInteger('ordering')->default(0);
            $table->timestamps();

            $table->foreign('parent_id', 'fk_category_parent')
                ->references('id')
                ->on('categories')
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
        Schema::table('categories', function(Blueprint $table) {
            $table->dropForeign('fk_category_parent');
        });

        Schema::dropIfExists('categories');
    }
}
