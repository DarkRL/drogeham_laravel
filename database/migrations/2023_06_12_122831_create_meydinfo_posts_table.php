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
            'fulltext' => '<h2>Mei Elkoar Yn Droegeham</h2>
            <p>Stichting Mei Elkoar Yn Droegeham, kortweg MEYD, is een stichting die zich inzet voor de inwoners van Drogeham.<br>De stichting heeft als doel om de leefbaarheid van Drogeham te vergroten. Dit doen we door de sociale samenhang te bevorderen. MEYD heeft inmiddels een groot vrijwilligers netwerk opgebouwd. De MEYD heeft drie pijlers: ontmoeten, gezondheid en meedoen.&nbsp;</p>
            <p>&nbsp;</p>
            <h4><strong>Ontmoeten</strong></h4>
            <p>Om elkaar te ontmoeten is de Doarpskeamer in het leven geroepen. Een laagdrempelige ontmoetingsplek voor mensen uit het dorp. Hier is ruimte voor activiteiten in groepsverband voor verschillende doelgroepen. Denk aan klaverjasmiddagen, spelletjesmiddagen, een high-tea of vrijdagmiddagborrel.</p>
            <p>Verenigingen, buurten of andere organisaties kunnen de Doarpskeamer huren voor bijvoorbeeld vergaderingen of cursussen. Aanmelden of meer informatie? Mail naar <a href="mailto:DeDoarpskeamer@gmail.com" target="_blank" rel="noopener">DeDoarpskeamer@gmail.com</a>.</p>
            <p>&nbsp;</p>
            <h4><strong>Gezondheid</strong></h4>
            <p>De werkgroep Fit&amp;Sun werkt samen met een aantal professionals aan een positieve leefstijl. Hierbij kan gedacht worden aan voeding (bijvoorbeeld het Doarpskeamerdiner of koken zonder pakjes/zakjes) en bewegen/mobiliteit om te kunnen (blijven) deelnemen aan activiteiten (bijv. de wandelgroep of fietsgroep).&nbsp;</p>
            <p>&nbsp;</p>
            <h4><strong>Meedoen</strong></h4>
            <p>Het activiteitenteam organiseert activiteiten voor jeugd, volwassenen en senioren. Denk hierbij aan de griezeltocht en paasstukjes maken. Doel is dat dorpsgenoten elkaar kunnen ontmoeten op een laagdrempelige manier.</p>
            <p>&nbsp;</p>
            <h5 style="text-align: center;"><em>&ldquo;Ien is mar allinnich, twa is al wat mear, mar mei- elkoar komt alles klear! &ldquo;<br>&copy; Mei Elkoar Yn Droegeham, 2020</em></h5>
            <p>&nbsp;</p>',
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
