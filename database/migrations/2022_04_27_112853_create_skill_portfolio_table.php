<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillPortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropForeign(['porfolio_id']);
        });
        Schema::table('skills', function (Blueprint $table) {
           
            $table->dropColumn('porfolio_id');
        });
        
        // many to many relationship between the 
        Schema::create('skill_porfolio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('porfolio_id')->constrained();
            $table->foreignId('skill_id')->constrained();
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
        Schema::dropIfExists('skill_porfolio');
        
        Schema::table('skills', function (Blueprint $table) {
            $table->bigInteger('porfolio_id');
        });
        
    }
}
