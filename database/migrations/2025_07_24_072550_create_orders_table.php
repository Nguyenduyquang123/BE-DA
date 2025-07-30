<?php

use App\CommonStatus;
use App\enum\CommonStatus as EnumCommonStatus;
use App\enum\OrderConfirmationStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('payments_id');
            $table->foreign('payments_id')->references('id')->on('payments');
            $table->decimal('total_price');
            $table->decimal('sale_price');
            $table->enum('confirmation_status', OrderConfirmationStatus::values())
                ->default(OrderConfirmationStatus::ChoXacNhan->value);
            $table->string('status')->default(EnumCommonStatus::Active->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
