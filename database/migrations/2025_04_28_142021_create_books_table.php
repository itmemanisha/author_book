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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('publisher_id')->constrained('publishers')->cascadeOnDelete();
            $table->string('title');
            $table->string('code')->nullable();
            $table->longText('description')->nullable();
            $table->string('language')->nullable();
            $table->string('copies')->nullable();
            $table->string('status')->default(1);
            $table->boolean('soft_copy')->default(0);
            $table->string('published_year')->nullable();
            $table->string('edition')->nullable();
            $table->string('pages')->nullable();
            $table->boolean('is_issued')->default(1);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
