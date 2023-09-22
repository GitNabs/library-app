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
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birthdate')->nullable();
            $table->string('nationality', 50)->nullable();
            $table->text('biography')->nullable();
            $table->timestamps(); // Created_at and updated_at timestamps
        });
        
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->foreignId('author_id')->constrained();//unsignedBigInteger
            $table->integer('publication_year');
            $table->string('isbn');
            $table->boolean('available')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('authors');
    }
};
