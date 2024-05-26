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
        Schema::create('orders', function (Blueprint $t) {
            $t->id();
            $t->foreignId('productid')->constrained('products')->onDelete('cascade');
            $t->foreignId('userid')->constrained('users')->onDelete('cascade');
            $t->integer('quantity');
            $t->integer('totalprice')->nullable();
            $t->string('status')->default('pending');
            $t->string('deliverydate');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
