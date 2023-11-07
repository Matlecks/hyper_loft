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
        Schema::create('catalog__categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('symbolic_code')->nullable();
            $table->text('anounce_text')->nullable();
            $table->text('anounce_image')->nullable();
            $table->text('detail_text')->nullable();
            $table->text('detail_image')->nullable();
            $table->text('SEOTitle')->nullable();
            $table->text('SEOKeys')->nullable();
            $table->text('SEODescription')->nullable();
            $table->text('ALTAnounceImg')->nullable();
            $table->text('TITLEAnounceImg')->nullable();
            $table->text('FileNameAnounceImg')->nullable();
            $table->text('ALTDetailsImg')->nullable();
            $table->text('FileNameDetailsImg')->nullable();
            $table->text('TAGS')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog__categories');
    }
};
