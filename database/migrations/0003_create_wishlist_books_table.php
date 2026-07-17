<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlist_books', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('asin', 20)->nullable()->unique();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('cover_url')->nullable();
            $table->string('amazon_url')->nullable();
            $table->string('price')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->unsignedInteger('rating_count')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlist_books');
    }
};
