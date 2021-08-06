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
                $table->foreignId('driver_id')->constrained('app.drivers');
                $table->foreignId('shop_id')->constrained('app.shops');
                $table->foreignId('payment_id')->constrained('app.payments');
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
        Schema::dropIfExists('travels');
    }
}
