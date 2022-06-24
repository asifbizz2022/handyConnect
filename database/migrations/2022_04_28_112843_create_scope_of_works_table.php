<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopeOfWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scope_of_works', function (Blueprint $table) {
            $table->id();
            $table->string('work_description');
            $table->string('work_cost')->nullable();
            $table->string('unit')->nullable();
            $table->string('scope_id');
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
        Schema::dropIfExists('scope_of_works');
    }
}
