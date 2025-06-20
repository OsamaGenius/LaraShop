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
            $table->foreignId('cate_id')->constrained('categories')->onDelete('cascade');
            $table->string('file')->default('default.jpg');
            $table->string('name')->unique();
            $table->decimal('price')->default(0.00);
            $table->integer('stock_quant')->default(0);
            $table->mediumText('description')->nullable()->default('');
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
