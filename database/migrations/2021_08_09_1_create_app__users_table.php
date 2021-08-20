<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))
            ->create('users', function (Blueprint $table) {
                $table->id();

                $table->string('name')
                    ->comment('Luis, Pablo, Carol');

                $table->string('phone')
                    ->comment('0986655432');

                $table->string('email')->unique()
                    ->comment('nmj.kim@example.com');

                $table->string('password')
                    ->comment('1232easd3123');

                $table->string('direction')
                    ->comment('chillogallo');

                $table->text('genred')
                    ->comment('famele, male');

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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('users');
    }
}
