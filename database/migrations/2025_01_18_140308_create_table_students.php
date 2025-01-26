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
        Schema::create('table_students', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nama'); // Nama Siswa
            $table->enum('status', ['Active', 'Reactive', 'Cuti', 'Stop']); // Status siswa
            $table->timestamps(); // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_students');
    }
};
