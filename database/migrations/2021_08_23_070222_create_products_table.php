<?php

use App\Enums\HairTypeEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
            $table->foreignId('category_id')->index()->constrained('categories')->cascadeOnDelete();
            $table->unsignedInteger('type');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('caption')->nullable();
            $table->text('description');
            $table->integer('price'); // eg store 10.50 as 1050.. format using Money PHP
            $table->integer('order')->nullable();
            $table->string('cover_image_url');
            $table->json('images')->nullable();
            $table->boolean('is_viewable')->default(true);
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
}
