<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name')
                    ->comment('doritos,coca cola,papas');

                $table->string('code')
                    ->comment('1232asdasq');

                $table->integer('amount')
                    ->comment('12,123,32');

                $table->decimal('price')
                    ->comment('12.32');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('products');
    }
}
