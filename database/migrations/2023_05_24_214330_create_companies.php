<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_name_kana');
            $table->string('representative_name')->nullable();
            $table->string('representative_position')->nullable();
            $table->string('headquarters_address')->nullable();
            $table->string('headquarters_postal_code')->nullable();
            $table->string('headquarters_phone')->nullable();
            $table->string('submission_address')->nullable();
            $table->string('submission_postal_code')->nullable();
            $table->string('submission_phone')->nullable();
            $table->string('recruitment_department')->nullable();
            $table->string('recruitment_contact')->nullable();
            $table->string('recruitment_contact_phone')->nullable();
            $table->string('recruitment_contact_fax')->nullable();
            $table->string('recruitment_contact_email')->nullable();
            $table->text('business_description')->nullable();
            $table->string('established')->nullable();
            $table->string('capital')->nullable();
            $table->string('annual_sales')->nullable();
            $table->string('stocks')->nullable();
            $table->integer('branch_count')->nullable();
            $table->integer('office_count')->nullable();
            $table->string('website_url')->nullable();
            $table->string('sharepoint_url')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
