<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang_name')->unique();
            $table->string('slug')->nullable();
            $table->string('lang_image');
            $table->timestamps();

            // for one to Many relationship. the many side bears the foregin key
            $table->unsignedBigInteger('porfolio_id');
            $table->foreign('porfolio_id')
                ->references('id')
                ->on('porfolios')
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
        Schema::dropIfExists('skills');
    }
}
