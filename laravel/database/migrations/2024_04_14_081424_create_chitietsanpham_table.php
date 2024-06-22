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
        Schema::create('chitietsanpham', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('sanpham_id');
        $table->foreign('sanpham_id')->references('id')->on('sanphams')->onDelete('cascade');
        $table->string('thuoctinh');
        $table->string('giatri');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietsanpham');
    }
};
