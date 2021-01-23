<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TestResult;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->string('state')
                  ->comment(implode(',', TestResult::STATES));

            $table->integer('score');
            $table->dateTime('deadline');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->integer('length')
                ->comment('in minutes how long do they have to solve test');
            $table->timestamps();

            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests');

            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('test_results');
    }
}
