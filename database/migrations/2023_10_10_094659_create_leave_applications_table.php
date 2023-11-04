<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->string('department'); // 学科
            $table->string('student_id'); // 学籍番号
            $table->string('name'); // 名前
            $table->datetime('start_date')->default(now());
            $table->datetime('end_date')->default(now());
            $table->string('subject'); // 科目名
            $table->string('teacher'); // 教員名
            $table->string('company_name'); // 企業名
            $table->string('location'); // 場所
            $table->text('content'); // 内容
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
        Schema::dropIfExists('leave_applications');
    }
}
