<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('shops', function (Blueprint $table) {
                $table->id();
                //foreing key de sellers y products 
                $table->foreignId('seller_id')->constrained('app.sellers');
                $table->foreignId('product_id')->constrained('app.products');
                $table->string('name');
                $table->string('code');
                $table->string('direction');
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
        Schema::dropIfExists('shops');
    }
}
