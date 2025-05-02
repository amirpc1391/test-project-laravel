<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogInTable extends Migration
{
    public function up()
    {
        Schema::create('log_in', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('body')->nullable();
            $table->string('url');
            $table->string('ip', 45);
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_in');
    }
}
