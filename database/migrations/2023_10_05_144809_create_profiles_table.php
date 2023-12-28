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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('about')->nullable();
            $table->string('photo_account')->nullable();
            $table->string('photo_cover')->nullable();
            $table->string('photo_perusahaan')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_universitas')->nullable();
            $table->string('telpon')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // Kolom kunci asing
            // Menambahkan kunci asing ke tabel "users"
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
