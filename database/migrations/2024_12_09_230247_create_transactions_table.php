<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
   {
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
            $table->unsignedBigInteger('user_id'); // Пользователь, к которому относится транзакция
            $table->string('account_number')->nullable(); // Номер счета
            $table->string('requisites')->nullable();
            $table->string('method')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('link')->nullable();
            $table->string('fio')->nullable();
            $table->decimal('transaction_amount', 10, 2); // Сумма транзакции
            $table->string('status'); // Статус транзакции (например, 'Успешно', 'Ошибка')
            $table->timestamp('transaction_date')->useCurrent(); // Дата транзакции
            $table->timestamps();

            // Индекс для связи с пользователем
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
}

public function down()
{
    Schema::dropIfExists('transactions');
}
};
