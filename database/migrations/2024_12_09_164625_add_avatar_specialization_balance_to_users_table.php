<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('email'); // Поле для хранения URL или пути к аватару
            $table->string('specialization')->nullable()->after('avatar'); // Поле для специализации
            $table->decimal('balance', 10, 2)->default(0.00)->after('specialization'); // Поле для баланса
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'specialization', 'balance']);
        });
    }
};
