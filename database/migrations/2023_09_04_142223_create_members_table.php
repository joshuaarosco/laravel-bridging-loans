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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->boolean('active')->default(0);
            
            $table->text('coe_path')->nullable();
            $table->text('coe_directory')->nullable();
            $table->string('coe_filename', 100)->nullable();

            $table->text('bc_path')->nullable();
            $table->text('bc_directory')->nullable();
            $table->string('bc_filename', 100)->nullable();

            $table->text('lp_path')->nullable();
            $table->text('lp_directory')->nullable();
            $table->string('lp_filename', 100)->nullable();
            
            $table->text('id_path')->nullable();
            $table->text('id_directory')->nullable();
            $table->string('id_filename', 100)->nullable();

            $table->text('fee_path')->nullable();
            $table->text('fee_directory')->nullable();
            $table->string('fee_filename', 100)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
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
