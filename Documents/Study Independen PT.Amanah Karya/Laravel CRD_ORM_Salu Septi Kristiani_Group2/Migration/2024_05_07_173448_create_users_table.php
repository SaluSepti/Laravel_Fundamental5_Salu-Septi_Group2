<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void 
{
    Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('nama_akun');
    $table->string('gender');
    $table->integer('umur');
    $table->date('tanggal_lahir');
    $table->string('alamat');
    $table->timestamps();
});

}


    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
