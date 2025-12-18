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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('company_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('client_id')
                ->constrained('clients')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description')->nullable();

            $table->decimal('amount', 10, 2);
            $table->string('payment_method')->default('pix');

            $table->enum('status', [
                'pending',
                'paid',
                'expired',
                'cancelled'
            ])->default('pending');

            $table->timestamp('due_at')->nullable();

            $table->timestamps();

            $table->index(['company_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
