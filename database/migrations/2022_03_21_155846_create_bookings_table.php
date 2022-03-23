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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->foreignId("owner_id")->constrained("users", "id");
            $table->foreignId("car_id")->constrained();
            $table->foreignId("buyer_id")->constrained("users", "id");
            $table->dateTime("start_date")->nullable();
            $table->dateTime("end_date")->nullable();
            $table->integer("number_of_days")->default(1);
            $table->float("rent")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
