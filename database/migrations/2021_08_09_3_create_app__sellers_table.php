<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('sellers', function (Blueprint $table) {
                $table->id();
                $table->string('ruc')
                    ->comment('176571829100011');

                //foreing key de shops y users
                $table->foreignId('user_id')->constrained('app.users')
                    ->comment('para obtener la informacion del usuario');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('sellers');
    }
}
