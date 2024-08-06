<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAttendiesTable extends Migration
{
    public function up()
    {
        Schema::create('event_attendies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('event_type');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_attendies');
    }
}
