<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('guardian_id')->constrained()->cascadeOnDelete();
            $table->foreignId('passenger_id')->constrained()->cascadeOnDelete();
            $table->string('plan_name');
            $table->decimal('amount', 10, 2);
            $table->unsignedTinyInteger('billing_day')->default(10);
            $table->date('starts_at');
            $table->date('ends_at')->nullable();
            $table->string('status', 30)->default('active');
            $table->timestamps();

            $table->index(['company_id', 'status']);
            $table->index(['company_id', 'billing_day']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
