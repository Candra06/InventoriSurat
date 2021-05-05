<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 40)->nullable();
            $table->string('favicon', 40)->nullable();
            $table->string('title', 20)->nullable();
            $table->string('tagline', 50)->nullable();
            $table->string('primary_color', 7)->nullable();
            $table->string('secondary_color', 7)->nullable();
            $table->string('gradient_primary', 30)->nullable();
            $table->string('gradient_secondary', 30)->nullable();
            $table->string('ig')->nullable();
            $table->string('fb')->nullable();
            $table->string('yt')->nullable();
            $table->string('tw')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('generals');
    }
}
