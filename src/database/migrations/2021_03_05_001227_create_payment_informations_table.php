<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_informations', function (Blueprint $table) {
            $table->id('id');
            $table->smallInteger('payment_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('card_last_four');
            $table->string('card_brand');
            $table->string('card_expire');
            $table->string('stripe_id');
            $table->string('trial_ends_at');
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
        Schema::dropIfExists('payment_informations');
    }
}
