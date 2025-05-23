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
        Schema::create('permissions', function (Blueprint $table) {
            /* $table->id();
            $table->string('name');
            $table->unsignedBigInteger('feature_id');
            $table->timestamps();
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade'); */
            $table->id();
            $table->string('name');
            $table->foreignId('feature_id')->constrained('features')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints(); // Equivalent to SET FOREIGN_KEY_CHECKS = 0;
        Schema::dropIfExists('permissions');
        Schema::enableForeignKeyConstraints();
    }
};
