<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('mail')->nullable();
            $table->string('phone')->nullable();
            $table->integer('group')->default(0);
            $table->string('formation');
            $table->integer('entry_year');
            $table->integer('obtaining_year')->nullable();
            $table->longText('study_text')->nullable();
            $table->longText('enterprise_info')->nullable();
            $table->longText('notepad')->nullable();
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
        Schema::dropIfExists('members');
    }
}
