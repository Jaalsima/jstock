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

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');

            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->integer('current_stock')->default(0);
            $table->integer('min_stock')->default(1)->nullable();
            $table->integer('max_stock')->default(2)->nullable();
            $table->string('measurement_unit')->nullable()->default('Unidad');
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->string('slug');
            $table->string('status')->default('Disponible');
            $table->date('expiration')->nullable()->default(null);
            $table->text('observations')->nullable()->default('N/A');
            $table->string('image')->nullable()->default('N/A');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
