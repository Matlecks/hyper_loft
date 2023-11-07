<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('message')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('status')->nullable();
            $table->string('category')->nullable();
            $table->string('label')->nullable();
            $table->string('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
