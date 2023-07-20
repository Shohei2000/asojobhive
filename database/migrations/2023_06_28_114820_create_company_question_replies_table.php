<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyQuestionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_question_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_question_id');
            $table->text('reply_content');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('company_question_id')->references('id')->on('company_questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_question_replies');
    }
}
