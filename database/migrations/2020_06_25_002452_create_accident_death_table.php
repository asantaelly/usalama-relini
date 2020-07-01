<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentDeathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_death', function (Blueprint $table) {  
            $table->foreignId('death_id')->constrained()->onDelete('cascade');
            $table->foreignId('accident_id')->constrained()->onDelete('cascade');
            $table->string('number');
            $table->timestamps();
            $table->index(['death_id', 'accident_id'])->unique(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accident_death');
    }
}
