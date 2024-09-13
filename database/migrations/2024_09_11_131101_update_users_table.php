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
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['admin', 'pastor', 'finance']); // Define roles
                $table->foreignId('church_id')->constrained('churches')->onDelete('cascade');
                $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade')->nullabe(); // Nullable for admins
            });
        }        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
