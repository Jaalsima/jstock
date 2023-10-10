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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('user_id'); // Usuario Administrador
            $table->date('purchase_date');
            $table->string('invoice_number')->unique(); // Número de factura de la compra
            $table->decimal('total_amount', 14, 2); // Monto total de la compra
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
