<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->id();
                $table->integer('organization_id')->nullable();
                $table->integer('thumbnail_id')->nullable();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email')->unique();
                $table->boolean('is_email_verified')->default(0);
                $table->string('password')->nullable();
                $table->string('phone')->nullable();
                // $table->string('slug')->unique();
                $table->smallInteger('language')->nullable();
                $table->boolean('status')->default(0);
                $table->boolean('is_admin')->default(0);
                $table->timestamp('first_login_at')->default(null);
                $table->timestamp('last_login_at')->default('1970-01-01 00:00:01');
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
