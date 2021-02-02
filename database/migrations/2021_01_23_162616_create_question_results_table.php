<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\QuestionResult;

class CreateQuestionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_results', function (Blueprint $table) {
            $table->id();
            $table->string('state')
                  ->comment(implode(',', QuestionResult::STATES));

            $table->integer('score');

            $table->unsignedBigInteger('test_result_id');
            $table->foreign('test_result_id')->references('id')->on('test_results');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');

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
        Schema::dropIfExists('question_results');
    }
}
