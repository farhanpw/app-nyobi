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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('member_id');
            $table->foreignId('order_id');

            $table->integer('total');
            $table->String('province');
            $table->String('city');
            $table->String('subdistrict');
            $table->String('detail_address');
            $table->String('status');
            $table->String('no_rek');
            $table->String('name_rek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
