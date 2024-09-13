<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('branch_id'); // Foreign key
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->string('address')->nullable();
        $table->string('membership_status');
        $table->date('joined_date');
        $table->enum('category', ['ladies', 'men', 'youths']); 
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
