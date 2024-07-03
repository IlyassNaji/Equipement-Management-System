<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\equipement;
use App\Models\User;
return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id('id_maintenance');
            $table->float('cout_maintenance');
            $table->date('date_maintenance');
            $table->string('status')->default('PENNDIG');
            $table->string('type_maintenance');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreignIdFor(Equipement::class,'id_equipement')->onDelete('cascade');
            $table->foreignIdFor(User::class)->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
