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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('symbolic_code')->nullable();
            $table->text('anounce_img')->nullable();
            $table->text('anounce_text')->nullable();
            $table->json('detail_img')->nullable();
            $table->text('detail_text')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('products');
    }
};
