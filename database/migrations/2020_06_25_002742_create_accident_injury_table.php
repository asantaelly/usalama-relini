<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentInjuryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_injury', function (Blueprint $table) {
            $table->foreignId('accident_id')->constrained()->onDelete('cascade');
            $table->foreignId('injury_id')->constrained()->onDelete('cascade');
            $table->string('number');
            $table->timestamps();
            $table->index(['injury_id', 'accident_id'])->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accident_injury');
    }
}
