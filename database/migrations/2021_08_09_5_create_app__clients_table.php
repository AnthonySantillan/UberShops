<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('clients', function (Blueprint $table) {
                $table->id();
                //foreing key de users y rol
                $table->foreignId('user_id')->constrained('app.users')
                    ->comment('para obtener la informacion del usuario');

                $table->foreignId('role_id')->constrained('app.roles')
                    ->comment('para asiganar un rol');

                $table->string('card')
                    ->comment('1234 1234 1234 1243');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('clients');
    }
}
