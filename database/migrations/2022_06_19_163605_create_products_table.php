<?php

use App\Enums\ProductStatuses;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('sku')->unique();
            $table->decimal('selling_price');
            $table->decimal('discount_price')->default(0);
            $table->integer('stock')->default(0);
            $table->enum('status', ProductStatuses::values())->default(ProductStatuses::UNPUBLISHED->value);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('discount_for')->default(now());
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
