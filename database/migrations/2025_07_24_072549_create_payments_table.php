<?php

use App\CommonStatus;
use App\enum\CommonStatus as EnumCommonStatus;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orders_id');
            $table->enum('payment', ["Cash on Delivery", "Online Payment","installment"]);
            $table->dateTime('paid');
            $table->string('status')->default(EnumCommonStatus::Active->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
