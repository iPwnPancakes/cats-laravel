<?php

use App\Models\Breed;
use App\Models\Cat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breed_cat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Cat::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Breed::class)->constrained()->onDelete('cascade');
            $table->integer('percentage')->default(100);

            $table->unique(['cat_id', 'breed_id']);
        });

        DB::statement('ALTER TABLE breed_cat ADD CONSTRAINT chk_percentage_range CHECK (percentage >= 0 AND percentage <= 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breed_cat');
    }
};
