<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accidents', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time_of_accident');
            $table->string('reference_number');
            $table->string('occured_at');
            $table->string('train');
            $table->string('loco_trolley')->nullable();
            $table->string('train_load');
            $table->string('driver_name');
            $table->string('guard_name')->nullable();
            $table->string('fuel_balance')->nullable();
            $table->string('received_from_control_location');
            $table->string('received_from_control_time');
            $table->string('belonged_quarter');
            $table->longText('brief_particulars');
            $table->text('damages')->nullable();
            $table->text('assistance_required')->nullable();
            $table->string('nature_of_accident');
            $table->string('accident_subject');
            $table->string('cause_of_accident');
            $table->string('responsible_designation');
            $table->string('time_spent_for_line_clear');
            $table->string('line_closure_time');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('accidents');
    }
}
