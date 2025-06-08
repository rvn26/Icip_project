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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->string('nama');
            $table->string('nomer');
            $table->text('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('patokan')->nullable();
            $table->enum('status', ['dipesan', 'terkirim', 'dibatalkan'])->default('dipesan');
            $table->date('tanggal_dikirim')->nullable();
            $table->date('tanggal_dibatalkan')->nullable();
            $table->timestamps();
            // Foreign key yang tidak menghapus order saat user dihapus
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
