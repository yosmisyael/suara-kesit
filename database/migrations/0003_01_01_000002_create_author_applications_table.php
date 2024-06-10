<?php

use App\Enums\Status;
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
        Schema::create('author_applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('token')->unique();
            $table->enum('status', array_column(Status::cases(), 'value'));
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('token_id')->nullable()->constrained('tokens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_applications');
    }
};
