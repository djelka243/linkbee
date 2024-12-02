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
        Schema::create('bio_link_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bio_link_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('title');
            $table->string('url');
            $table->string('icon');
            $table->integer('position')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bio_link_items');
    }
};
