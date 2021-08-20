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
                $table->foreignId('seller_id')->constrained('app.sellers')
                    ->comment('Para obtener la informacion del vendedor');

                $table->foreignId('product_id')->constrained('app.products')
                    ->comment('Para obtener la informacion de un producto');

                $table->string('name')
                    ->comment('La esquina, Verduras Maria ');

                $table->string('code')
                    ->comment('123sadw');

                $table->string('direction')
                    ->comment('san luis');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('shops');
    }
}
