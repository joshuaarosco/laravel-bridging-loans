<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('loan_status')->nullable();

            $table->string('pb_no')->nullable();

            $table->string('oath_1')->nullable();
            $table->string('oath_2')->nullable();
            $table->string('oath_3')->nullable();
            $table->string('oath_4')->nullable();
            $table->string('oath_5')->nullable();
            $table->string('oath_6')->nullable();
            $table->string('oath_7')->nullable();

            $table->string('purpose')->nullable();
            $table->string('collateral')->nullable();
            $table->unsignedBigInteger('type_id');
            
            $table->string('applicant')->nullable();
            $table->string('address')->nullable();
            $table->string('date_employed')->nullable();
            $table->string('position')->nullable();
            $table->string('spouse')->nullable();
            
            $table->date('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('employer')->nullable();
            $table->double('monthly_salary', 8, 2)->nullable();
            $table->string('employment_status')->nullable();
            $table->integer('no_of_dependents')->nullable();
            $table->string('contact_number')->nullable();

            $table->unsignedBigInteger('co1_id')->nullable();
            $table->string('co1_status')->nullable();
            $table->string('co1_name')->nullable();
            $table->string('co1_address')->nullable();
            $table->string('co1_date_employed')->nullable();
            $table->string('co1_position')->nullable();

            $table->unsignedBigInteger('co2_id')->nullable();
            $table->string('co2_status')->nullable();
            $table->string('co2_name')->nullable();
            $table->string('co2_address')->nullable();
            $table->string('co2_date_employed')->nullable();
            $table->string('co2_position')->nullable();

            $table->string('co1_contact_number')->nullable();
            $table->string('co1_employer')->nullable();
            $table->double('co1_monthly_salary', 8, 2)->nullable();
            $table->string('co1_employment_status')->nullable();
            $table->string('co2_contact_number')->nullable();
            $table->string('co2_employer')->nullable();
            $table->double('co2_monthly_salary', 8, 2)->nullable();
            $table->string('co2_employment_status')->nullable();

            $table->date('cert_application_date')->nullable();
            $table->text('cert_signed')->nullable();
            $table->string('cert_address')->nullable();

            $table->string('evaluated_by')->nullable();

            $table->string('meeting_1')->nullable();
            $table->string('meeting_2')->nullable();
            $table->string('meeting_3')->nullable();
            $table->string('meeting_4')->nullable();
            $table->string('meeting_5')->nullable();

            $table->text('chair')->nullable();
            $table->string('chair_name')->nullable();
            $table->text('member_1')->nullable();
            $table->string('member_1_name')->nullable();
            $table->text('member_2')->nullable();
            $table->string('member_2_name')->nullable();

            $table->text('cob')->nullable();
            $table->string('cob_name')->nullable();
            $table->text('gm')->nullable();
            $table->string('gm_name')->nullable();
            $table->text('ao')->nullable();
            $table->string('ao_name')->nullable();
            $table->text('cc')->nullable();
            $table->string('cc_name')->nullable();

            $table->double('loan_granted', 8, 2)->nullable();
            $table->double('less_charges', 8, 2)->nullable();

            $table->double('processing', 8, 2)->nullable();
            $table->double('oc0_val', 8, 2)->nullable();
            $table->double('total_0', 8, 2)->nullable();

            $table->double('notarial_fee', 8, 2)->nullable();
            $table->string('oc1_title')->nullable();
            $table->double('oc1_val', 8, 2)->nullable();
            $table->double('total_1', 8, 2)->nullable();

            $table->double('prev_loan_bal', 8, 2)->nullable();
            $table->string('oc2_title')->nullable();
            $table->double('oc2_val', 8, 2)->nullable();
            $table->double('total_2', 8, 2)->nullable();

            $table->double('interest', 8, 2)->nullable();
            $table->string('oc3_title')->nullable();
            $table->double('oc3_val', 8, 2)->nullable();
            $table->double('total_3', 8, 2)->nullable();

            $table->double('share_capital', 8, 2)->nullable();
            $table->string('oc4_title')->nullable();
            $table->double('oc4_val', 8, 2)->nullable();
            $table->double('total_4', 8, 2)->nullable();

            $table->double('first_installment', 8, 2)->nullable();
            $table->string('oc5_title')->nullable();
            $table->double('oc5_val', 8, 2)->nullable();
            $table->double('total_5', 8, 2)->nullable();

            $table->double('insurance', 8, 2)->nullable();
            $table->string('oc6_title')->nullable();
            $table->double('oc6_val', 8, 2)->nullable();
            $table->double('total_6', 8, 2)->nullable();

            $table->double('insurance_refund', 8, 2)->nullable();
            $table->string('oc7_title')->nullable();
            $table->double('oc7_val', 8, 2)->nullable();
            $table->double('total_7', 8, 2)->nullable();

            $table->double('fine_penalty', 8, 2)->nullable();
            $table->double('total_charges', 8, 2)->nullable();
            $table->double('total_charges_final', 8, 2)->nullable();
            
            $table->double('net_proceeds', 8, 2)->nullable();
            
            $table->double('note_1', 8, 2)->nullable();
            $table->double('note_2', 8, 2)->nullable();

            $table->string('footer_signed')->nullable();
            $table->date('footer_date')->nullable();
             
            $table->string('cdv_no')->nullable();
            $table->date('cdv_date')->nullable();
            $table->string('cc_no')->nullable();
            $table->date('cc_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('co1_id')->references('id')->on('users');
            $table->foreign('co2_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('loan_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
