<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVcanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->unsignedBigInteger('organizationmy_id')->nullable()->unsigned()->index();
        });
        Schema::table('vacancies', function (Blueprint $table) {
            $table->foreign('organizationmy_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
