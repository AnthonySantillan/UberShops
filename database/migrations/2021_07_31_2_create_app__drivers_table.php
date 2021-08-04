<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('app.vehicles');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->text('direction');
            $table->string('license');

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
        Schema::connection(env('DB_CONNECTION-APP'))->dropIfExists('drivers');
    }
}
