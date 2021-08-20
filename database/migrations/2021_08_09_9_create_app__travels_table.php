<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('travels', function (Blueprint $table) {
                $table->id();
                //poner las foreing key una de drivers otra de shops y otra de payment
                $table->foreignId('driver_id')->constrained('app.drivers')
                    ->comment('para obtener la informacion del conductor');

                $table->foreignId('client_id')->constrained('app.clients')
                    ->comment('para obtener la informacion del cliente');

                $table->foreignId('shop_id')->constrained('app.shops')
                    ->comment('para obtener la informacion de la tienda');

                $table->foreignId('detail_id')->constrained('app.details')
                    ->comment('para obtener la informacion del detalle de la compra');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('travels');
    }
}
