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
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('drivers', function (Blueprint $table) {
                $table->id();
                $table->string('license');
                //foreing key de vehiculo y users
                $table->foreignId('user_id')->constrained('app.users');
                $table->foreignId('vehicle_id')->constrained('app.vehicles');
                $table->foreignId('role_id')->constrained('app.roles');
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
        Schema::dropIfExists('drivers');
    }
}
