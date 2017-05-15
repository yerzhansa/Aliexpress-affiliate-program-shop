<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlikeywordContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alikeyword_content', function (Blueprint $table) {
            $table->integer('alikeyword_id')->unsigned()->nullable();
            $table->foreign('alikeyword_id')->references('id')
                ->on('alikeywords')->onDelete('cascade');

            $table->integer('content_id')->unsigned()->nullable();
            $table->foreign('content_id')->references('id')
                ->on('contents')->onDelete('cascade');

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
        Schema::dropIfExists('alikeyword_content');
    }
}
