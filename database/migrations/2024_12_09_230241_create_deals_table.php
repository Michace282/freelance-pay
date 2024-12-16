<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('executor_id');
            $table->decimal('amount', 10, 2); // Сумма сделки
            $table->decimal('comission', 10, 2); // Сумма сделки
            $table->text('deal_title')->nullable(); // Описание сделки
            $table->text('description')->nullable(); // Описание сделки
            $table->string('status'); // Статус сделки (например, 'Выполнено', 'Ожидает подтверждения')
            $table->enum('role', ['Исполнитель', 'Заказчик']); // Роль пользователя, который создает сделку
            $table->datetime('deal_date')->nullable(); // Дата создания сделки
            $table->timestamps();

            // Индексы для быстрого поиска по user_id
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('executor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('deals');
    }
};
