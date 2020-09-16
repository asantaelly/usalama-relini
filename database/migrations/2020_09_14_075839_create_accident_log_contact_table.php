<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentLogContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accident_log_contact', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time')->nullable();
            $table->string('remarks')->nullable();
            $table->foreignId('officer_contact_id')->constrained()->onDelete('cascade');
            $table->foreignId('accident_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('accident_log_contact');
    }
}
