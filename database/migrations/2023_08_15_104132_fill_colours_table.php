<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Colour;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $colourYellow = new Colour();
        $colourYellow->hex = 'F2D658';
        $colourYellow->save();

        $colourOlive = new Colour();
        $colourOlive->hex = '789258';
        $colourOlive->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Colour::query()->delete();
    }
};
