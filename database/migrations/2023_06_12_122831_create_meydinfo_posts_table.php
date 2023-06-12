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
        Schema::create('meydinfo_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->dateTime('updated_at')->useCurrent();
        });

        DB::table('meydinfo_posts')->insert([
            'fulltext' => 'Deze tekst is voor meyd algemene info. Verander deze! :-)',
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meydinfo_posts');
    }
};
