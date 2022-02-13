<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('link',255);
            $table->string('guid', 255);
            $table->text('description')->nullable();
            $table->string('pubDate', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parses');
    }
}
