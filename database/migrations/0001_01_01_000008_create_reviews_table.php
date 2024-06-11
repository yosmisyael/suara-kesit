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
        $allowedEnums = array_filter(array_column(Status::cases(), 'value'), function ($enum) {
            return $enum !== 'pending';
        });

        Schema::create('reviews', function (Blueprint $table) use ($allowedEnums) {
            $table->id();
            $table->enum('status', $allowedEnums);
            $table->text('note');
            $table->foreignId('submission_id')->constrained('submissions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
