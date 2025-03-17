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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->text('description');
            $table->enum('type', ['Sieraden', 'Keramiek', 'Textiel', 'Kunst']); // Bijvoorbeeld: Sieraden, Keramiek, Textiel, Kunst
            $table->text('material_usage'); // Details over de gebruikte grondstoffen
            $table->integer('production_time'); // Geschatte tijd nodig voor vervaardiging (in uren)
            $table->string('complexity'); // Mate van vakmanschap en technische uitdaging
            $table->text('durability'); // Levensduur en onderhoudsvoorschriften
            $table->text('unique_features'); // Speciale technieken of afwerkingen
            $table->decimal('price', 10, 2);
            $table->string('image_path'); // Pad naar de afbeelding van het product
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
