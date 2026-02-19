<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        // TÂCHE : modifiez cette migration pour que la suppression d'une catégorie entraîne la suppression automatique de ses produits (cascade)
        // Indice : utilisez ->cascadeOnDelete() ou onDelete('cascade') sur la clé étrangère (foreign key)
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
