<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            //category_id という 外部キー（他のテーブルとつながるID） を作って、「その親データ（カテゴリ）が消されたら、これも一緒に消す」という設定
            $table->string('content', 20);
            $table->date('scheduled_date')->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
