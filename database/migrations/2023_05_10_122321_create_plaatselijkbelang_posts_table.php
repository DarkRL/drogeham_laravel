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
        Schema::create('plaatselijkbelang_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->timestamp('datetime')->useCurrent();
        });

        DB::table('plaatselijkbelang_posts')->insert([
            'fulltext' => '<h3>Plaatselijk Belang</h3>
            <p>Het bestuur van plaatselijk belang Drogeham bestaat uit zeven leden.</p>
            <ul>
            <li>Klaas Alma 0633513612 (voorzitter)</li>
            <li>Anneke v/d Gali&euml;n (secretaresse)</li>
            <li>Lonneke Wijma (penningmeester)</li>
            <li>Henrike de Jong (algemeen bestuurslid)</li>
            <li>Jan Tjoelker (algemeen bestuurslid/Webmaster)</li>
            </ul>',
            'datetime' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plaatselijkbelang_posts');
    }
};
