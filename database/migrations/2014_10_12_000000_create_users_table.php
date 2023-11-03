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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 50)->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('is_editor')->default(0);
            $table->boolean('role')->default(0); // 0 for user, 1 for admin
            $table->rememberToken();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
