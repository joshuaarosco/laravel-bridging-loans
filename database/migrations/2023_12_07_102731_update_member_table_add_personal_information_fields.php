<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMemberTableAddPersonalInformationFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function($table){
            $table->string('contact_number')->nullable()->after('active');
            $table->integer('no_of_dependents')->nullable()->after('active');
            $table->string('employment_status')->nullable()->after('active');
            $table->double('monthly_salary', 8, 2)->nullable()->after('active');
            $table->string('employer')->nullable()->after('active');
            $table->integer('age')->nullable()->after('active');
            $table->date('birthdate')->nullable()->after('active');
            $table->string('spouse')->nullable()->after('active');
            $table->string('position')->nullable()->after('active');
            $table->string('date_employed')->nullable()->after('active');
            $table->string('address')->nullable()->after('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function($table){
            $table->dropColumn(array( 
                'contact_number',
                'no_of_dependents',
                'employment_status',
                'monthly_salary',
                'employer',
                'age',
                'birthdate',
                'spouse',
                'position',
                'date_employed',
                'address'
            ));
        });
    }
}
