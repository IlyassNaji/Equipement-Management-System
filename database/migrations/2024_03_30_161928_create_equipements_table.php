<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
 return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->id('id_equipement');
            $table->string('nom'); 
            $table->string('categorie');
            $table->string('marque');
            $table->string('modele');
            $table->string('numero_serie');
            $table->string('valable')->default('1');
            $table->date('date_achat');
            $table->string('description')->nullable();
            $table->float('état')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->string('num_bureau');
            $table->foreignIdFor(User::class)->onDelete('cascade')->nullable();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
