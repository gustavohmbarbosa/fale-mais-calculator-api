<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_prices', function (Blueprint $table) {
            $table->id();
            $table->string('origin', 3);
            $table->string('destiny', 3);
            $table->float('rate_per_minute', 5, 2);
            $table->timestamps();

            $table->foreign('origin')->references('code')->on('codes');
            $table->foreign('destiny')->references('code')->on('codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_prices');
    }
};
