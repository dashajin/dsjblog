<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('用户ID');
            $table->string('reply_id')->comment('回复评论ID')->default(null);
            $table->text('content')->comment('评论内容');
            $table->integer('article_id')->index()->comment('文章id');
            $table->integer('goodNum')->unsigned()->default(0)->comment('赞同数');
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
        Schema::dropIfExists('comments');
    }
}
