<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_answers', function (Blueprint $table) {

            $table->id();
            $table->text('description');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('answer_id');
           
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->nullOnDelete();
            
            $table->foreign('answer_id')->references('id')->on('answers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_answers');
    }
}
