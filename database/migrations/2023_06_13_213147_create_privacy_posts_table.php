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
        Schema::create('privacy_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->timestamp('updated_at')->useCurrent();
        });

        DB::table('privacy_posts')->insert([
            'fulltext' => '<h1>Privacy verklaring</h1>
            <p>Plaatselijk Belang Drogeham is verantwoordelijk voor de verwerking van persoonsgegevens zoals weergegeven in deze privacyverklaring.</p>
            <p><strong>Persoonsgegevens die wij verwerken</strong><br>Plaatselijk Belang Drogeham verwerkt uw persoonsgegevens omdat u deze zelf aan ons verstrekt. De persoonsgegevens die wij verwerken zijn voor- en achternaam en E-mailadres.</p>
            <p><strong>Met welk doel en op basis van welke grondslag wij persoonsgegevens verwerken</strong><br>Plaatselijk Belang Drogeham verwerkt uw persoonsgegevens om u te kunnen bellen of e-mailen indien dit nodig is.</p>
            <p><strong>Delen van persoonsgegevens met derden</strong><br>Plaatselijk Belang Drogeham verstrekt uitsluitend aan derden en alleen als dit nodig is voor de uitvoering van onze overeenkomst met u of om te voldoen aan een wettelijke verplichting.</p>
            <p><strong>Cookies, of vergelijkbare technieken, die wij gebruiken</strong><br>Plaatselijk Belang Drogeham gebruikt geen cookies of vergelijkbare technieken.</p>
            <p><strong>Gegevens inzien, aanpassen of verwijderen</strong><br> U kunt een verzoek tot inzage, correctie, verwijdering, gegevensoverdraging van uw persoonsgegevens of verzoek tot intrekking van uw toestemming of bezwaar op de verwerking van uw persoonsgegevens sturen naar <a href="mailto:pbdrogeham@gmail.com?Subject=Klacht%20over%20privacyverklaring%20drogeham.com">pbdrogeham@gmail.com</a>.<br></p>
            <p><strong>Hoe wij persoonsgegevens beveiligen</strong><br>Plaatselijk Belang Drogeham neemt de bescherming van uw gegevens serieus en neemt passende maatregelen om misbruik, verlies, onbevoegde toegang, ongewenste openbaarmaking en ongeoorloofde wijziging tegen te gaan. Als u de indruk heeft dat uw gegevens niet goed beveiligd zijn of er aanwijzingen zijn van misbruik, neem dan contact op via <a href="mailto:pbdrogeham@gmail.com?Subject=Klacht%20over%20privacyverklaring%20drogeham.com">pbdrogeham@gmail.com</a>.</p>',
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_posts');
    }
};
