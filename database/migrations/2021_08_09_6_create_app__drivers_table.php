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
                $table->string('license')
                    ->comment('para obtener la informacion del usuario');

                //foreing key de vehiculo, users y roles
                $table->foreignId('user_id')->constrained('app.users')
                    ->comment('para obtener la informacion del usuario');

                $table->foreignId('vehicle_id')->constrained('app.vehicles')
                    ->comment('para obtener la informacion del vehiculo');

                $table->foreignId('role_id')->constrained('app.roles')
                    ->comment('para asiganar un rol');

                $table->softDeletes();
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('drivers');
    }
}
