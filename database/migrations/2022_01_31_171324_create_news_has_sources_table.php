<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsHasSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_has_sources', function (Blueprint $table) {
            $table->foreignId('news_id')
                ->constrained('news')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('sources_id');
            $table->foreign('sources_id')
                ->references('id')
                ->on('sources')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_has_sources');
    }
}
