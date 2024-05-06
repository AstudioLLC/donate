<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('filter_id');
            $table->timestamps();

            $table->foreign('filter_id', 'fk_criterion_filter')
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
        Schema::table('criteria', function (Blueprint $table) {
            $table->dropForeign('fk_criterion_filter');
        });

        Schema::dropIfExists('criteria');
    }
}
