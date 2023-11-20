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
        Schema::create('complaints', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('title', 50);
            $table->text('body');
            $table->enum('status', ['belum diproses', 'sedang diproses', 'selesai']);
            $table->text('response')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('unic_code', 6);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
