<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
   {
    Schema::create('chats', function (Blueprint $table) {
        $table->id();
            $table->unsignedBigInteger('deal_id'); // Сделка, к которой привязан чат
            $table->unsignedBigInteger('sender_id'); // Отправитель сообщения (пользователь)
            $table->text('message'); // Сообщение
            $table->enum('message_type', ['system', 'user', 'admin']); // Тип сообщения ('system' — системное, 'user' — от пользователя, 'admin' — от администратора)
            $table->timestamps();

            // Индексы для быстрого поиска по deal_id и sender_id
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
}

public function down()
{
    Schema::dropIfExists('chats');
}
};
