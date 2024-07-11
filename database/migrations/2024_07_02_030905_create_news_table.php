<?php

use App\Models\Category;
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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->dateTime('published_date');
            $table->foreignIdFor(Category::class)->constrained();
            $table->unsignedBigInteger('views')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_new')->default(false);
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
