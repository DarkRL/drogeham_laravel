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
        Schema::create('brinkpraat_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->timestamp('updated_at')->useCurrent();
        });

        DB::table('brinkpraat_posts')->insert([
            'fulltext' => '<h3>Brinkpraat</h3>
            <p>Drogeham heeft sinds 1986 een dorpskrant met de naam Brinkpraat. Deze naam herinnert aan de vroegere brink. De inhoud bestaat uit activiteiten, geschiedenis en algemene informatie over het dorp.</p>
            <p>Hieronder staat een overzicht met alle edities van de Brinkpraat van 2019. Wanneer er een nieuwe editie verschenen is, zal die zo snel mogelijk hieronder gepubliceerd worden.</p>
            <p><a href="mailto:brinkpraat@chello.nl" target="_blank" rel="noopener">Hier kunt u terecht met vragen en/of opmerkingen over de dorpskrant.</a></p>',
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brinkpraat_posts');
    }
};
