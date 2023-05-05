<?php

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
        Schema::create('home_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->timestamp('datetime')->useCurrent();
        });

        DB::table('home_posts')->insert([
            'fulltext' => 'Deze tekst is voor de homepagina. Verander deze! :-)',
            'datetime' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_posts');
    }
};
