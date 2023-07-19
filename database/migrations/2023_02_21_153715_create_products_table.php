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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('vendor_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('size_id');
            $table->string('name');
            $table->string('type');
            $table->float('price',8,2);
            $table->unsignedInteger('qty');
            $table->text('short_description');
            $table->longText('long_description');
            $table->string('image');
            $table->string('multi_image');
            $table->boolean('status')->default(0);
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
