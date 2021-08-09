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
                $table->foreignId('product_id')->constrained('app.products');
                $table->foreignId('payment_id')->constrained('app.payments');
                $table->integer('amount');
                $table->date('delivery_date');
                $table->date('delivery_time');
                $table->decimal('value');
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
        Schema::dropIfExists('adetails');
    }
}
