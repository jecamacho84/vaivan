<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('passenger_schedule_days', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('passenger_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('weekday');
            $table->boolean('going')->default(true);
            $table->boolean('returning')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['passenger_id', 'weekday']);
            $table->index(['company_id', 'weekday']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('passenger_schedule_days');
    }
};
