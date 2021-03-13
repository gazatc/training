<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('region_id');
            $table->string('title');
            $table->enum('jobType', [1, 2, 3]); //1 Full, 2 Part, 3 Freelance
            $table->text('description');
            $table->text('requirement');
            $table->date('last_date');
            $table->enum('salary_type', [1, 2]); //1 Hourly, 2 Fixed
            $table->double('salary_amount', 8,2);
            $table->enum('for', [1, 2]); //1 Single, 2 Team
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
