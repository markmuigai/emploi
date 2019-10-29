<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug',50)->unique();
            $table->integer('company_id');
            $table->integer('location_id');
            $table->integer('vacancy_type_id');
            $table->integer('positions')->default(1);
            $table->string('title',50);
            $table->string('image',500)->nullable();
            $table->integer('industry_id');
            $table->integer('education_requirements');
            $table->integer('experience_requirements');
            $table->text('responsibilities')->nullable();
            $table->text('how_to_apply')->nullable();
            $table->text('benefits')->nullable();
            $table->decimal('monthly_salary',10,2)->default(0);
            $table->timestamp('deadline')->nullable();
            $table->string('cover_required')->default('true');
            $table->string('portfolio_required')->default('true');
            $table->string('featured')->default('false');
            $table->string('status',50)->default('pending');
            $table->integer('verified_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
