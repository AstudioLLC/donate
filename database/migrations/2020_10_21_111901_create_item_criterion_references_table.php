<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCriterionReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_criterion_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->index();
            $table->unsignedBigInteger('criterion_id')->index();

            $table->foreign('item_id', 'fk_item_criterion')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('criterion_id', 'fk_criterion_item')
                ->references('id')
                ->on('criteria')
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
        Schema::table('item_criterion_references', function (Blueprint $table) {
            $table->dropForeign('fk_item_criterion');
            $table->dropForeign('fk_criterion_item');
        });

        Schema::dropIfExists('item_criterion_references');
    }
}
