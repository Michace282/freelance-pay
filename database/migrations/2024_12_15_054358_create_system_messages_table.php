<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('system_messages', function (Blueprint $table) {
            $table->id(); // ID сообщения
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Внешний ключ на таблицу users
            $table->text('message'); // Поле для системного сообщения
            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_messages'); // Удаление таблицы
    }
}