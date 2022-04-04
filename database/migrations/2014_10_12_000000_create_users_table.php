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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob')->nullable()->comment('date of birth');
            $table->integer('role_id');
            $table->string('lrn')->nullable()->unique();
            $table->boolean('is_male')->default(1);
            $table->string('email')->unique();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->integer('advisory_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('todo')->nullable();
            $table->string('sy')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
