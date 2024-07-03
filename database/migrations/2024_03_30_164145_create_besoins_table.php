<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Equipement;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('besoins', function (Blueprint $table) {
            $table->id('id_besoin');
            $table->string('type_besoin');
            $table->string('status')->default('PENDING');
            $table->date('date_besoin')->default(DB::raw('CURRENT_DATE'));
            $table->string('description');
            $table->foreignIdFor(User::class)->onDelete('cascade');
            $table->foreignIdFor(Equipement::class,'id_equipement')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('besoins');
    }
};
