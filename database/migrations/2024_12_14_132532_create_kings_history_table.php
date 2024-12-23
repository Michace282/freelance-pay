<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for kings_history
class CreateKingsHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('kings_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 10, 2); // Use decimal for financial values
            $table->string('status'); // Status field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kings_history');
    }
}
