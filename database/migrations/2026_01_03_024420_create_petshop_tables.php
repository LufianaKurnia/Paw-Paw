<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Update Tabel Users (Tambah kolom phone, role, profile_photo)
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('password');
            $table->enum('role', ['admin', 'mitra', 'user'])->default('mitra')->after('phone');
            $table->string('profile_photo')->nullable()->after('role'); // <--- INI PENTING
        });

        // 2. Tabel Petshops
        Schema::create('petshops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_toko');
            $table->text('alamat')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->text('deskripsi')->nullable();
            $table->float('rating')->default(0);
            $table->timestamps();
        });

        // 3. Tabel Products (Barang)
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petshop_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('category');
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // 4. Tabel Grooming Services (Jasa)
        Schema::create('grooming_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petshop_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('pet_type', ['Kucing', 'Anjing', 'Hamster', 'Kelinci']);
            $table->decimal('price', 12, 2);
            $table->timestamps();
        });

        // 5. Tabel Orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petshop_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number');
            $table->string('customer_name');
            $table->text('customer_address')->nullable();
            $table->string('status');
            $table->decimal('total_price', 12, 2);
            $table->string('resi_number')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('grooming_services');
        Schema::dropIfExists('products');
        Schema::dropIfExists('petshops');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'role', 'profile_photo']);
        });
    }
};