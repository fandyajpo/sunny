<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('stock');
            $table->integer('price');
            $table->foreignId('category')->nullable()->constrained("category")->onDelete('set null');
            $table->foreignId('supplier')->nullable()->constrained("supplier")->onDelete('set null');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::drop('barang');
    }
};
