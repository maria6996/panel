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
            $table->string('fa_name');
            $table->string('en_name');
            $table->string('model');
            $table->string('slug');
            $table->integer('count');
            $table->string('shortDescription');
            $table->string('fullDescription');
            $table->foreignId('media_id')->constrained('medias');
            $table->string('price');
            $table->string('available');
            $table->tinyInteger('status')->default(0);
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
