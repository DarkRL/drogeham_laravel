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
        Schema::create('disclaimer_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->timestamp('updated_at')->useCurrent();
        });

        DB::table('disclaimer_posts')->insert([
            'fulltext' => '<h1>Colofon & disclaimer</h1>
            <p><strong>Auteursrecht</strong><br>Neem contact op met <a href="mailto:pbdrogeham@gmail.com">Plaatselijk Belang Drogeham</a> mocht er een tekst of afbeelding op deze site staan waarvan verkeerde copyrights worden gebruikt.<br><br><strong>Disclaimer</strong><br>De website drogeham.com is zorgvuldig samengesteld, maar er kan niet gegarandeerd worden dat de site geen onjuiste of verouderde informatie bevat. Plaatselijk Belang Drogeham aanvaardt daarom geen aansprakelijkheid van eventuele onjuiste informatie op deze site. De site is uitsluitend bedoeld als informatiebron.</p>
            <p><strong>Privacy</strong><br>Tijdens activiteiten van Plaatselijk Belang of MEYD kunnen fotos worden gemaakt voor promotionele doeleinden. Heeft u bezwaar tegen het plaatsen van fotos van uzelf en/of uw kind geef dit dan aan bij de fotograaf.</p>',
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disclaimer_posts');
    }
};
