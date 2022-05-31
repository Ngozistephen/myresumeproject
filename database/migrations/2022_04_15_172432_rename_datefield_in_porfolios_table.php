<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDatefieldInPorfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('porfolios', function (Blueprint $table) {
            $table->renameColumn('dates', 'end_date');
            $table->date('start_date')->default(now())->after('dates');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('porfolios', function (Blueprint $table) {
            // droping the table
            $table->renameColumn('end_date', 'dates');
            $table->dropColumn('start_date');
        });
    }
}
