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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->decimal('price')->nullable();
            $table->decimal('old_price');
            $table->text('image_url');
            $table->boolean('slide');
            $table->boolean('installment');
            $table->boolean('discounted');
            $table->text('desciption');
            $table->text('specifications');
            $table->string('slug');
            $table->string('status')->default(EnumCommonStatus::Pending->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
