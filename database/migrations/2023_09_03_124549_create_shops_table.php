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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('schedule')->nullable();
            $table->text('pay_variables')->nullable();
            $table->text('img')->nullable();
            $table->text('anounce_text')->nullable();
            $table->text('details_text')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
