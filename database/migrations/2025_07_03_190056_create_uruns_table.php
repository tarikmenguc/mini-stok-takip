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
        Schema::create('uruns', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
        $table->decimal('fiyat', 8, 2);
        $table->unsignedBigInteger('kategori_id');
        $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
       $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uruns');
    }
};
