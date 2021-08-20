<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained('app.products')
                    ->comment('apra obtener la informacion del producto');

                $table->foreignId('payment_id')->constrained('app.payments')
                    ->comment('para obtener la informacion del metodo de pago');

                $table->integer('amount')
                    ->comment('123');

                $table->date('delivery_date')
                    ->comment('1902-12-12');

                $table->time('delivery_time')
                    ->comment('12:21:12');

                $table->decimal('value')
                    ->comment('12.123');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('details');
    }
}
