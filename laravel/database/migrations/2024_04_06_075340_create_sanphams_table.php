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
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table-> string('tensp');
            $table-> string('anhsp');
            $table-> string('giasp');
            $table-> string('soluongsp');
            $table-> string('motasp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanphams');
    }
};
