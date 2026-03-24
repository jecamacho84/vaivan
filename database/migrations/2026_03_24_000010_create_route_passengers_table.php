<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('route_passengers', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('route_id')->constrained()->cascadeOnDelete();
            $table->foreignId('passenger_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('stop_order')->default(0);
            $table->string('pickup_address')->nullable();
            $table->string('dropoff_address')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['route_id', 'passenger_id']);
            $table->index(['company_id', 'route_id', 'stop_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('route_passengers');
    }
};
