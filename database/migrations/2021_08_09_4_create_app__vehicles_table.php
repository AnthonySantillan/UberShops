<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('vehicles', function (Blueprint $table) {
                $table->id();
                $table->string('plate')
                    ->comment('asc-12312');

                $table->string('color')
                    ->comment('red, blue, cyan');

                $table->string('enrollment')
                    ->comment('2020-12-02');

                $table->integer('year')
                    ->comment('2019,1980');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('vehicles');
    }
}
