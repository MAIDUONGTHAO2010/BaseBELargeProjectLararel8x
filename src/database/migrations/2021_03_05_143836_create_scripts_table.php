<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scripts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->tinyInteger('type_id')->nullable(false);
            $table->string('version', 10)->nullable(false);
            $table->string('phone_model')->nullable(false);
            $table->string('os_version')->nullable(false);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->decimal('price',9,3)->nullable(false)->default(0);
            $table->integer('currency')->nullable(false)->default(0); // 0: USD 
            $table->string('description');
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
        Schema::dropIfExists('scripts');
    }
}
