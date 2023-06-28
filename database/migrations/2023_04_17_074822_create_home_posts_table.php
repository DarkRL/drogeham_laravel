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
            $table->text('photo');
            $table->timestamp('datetime')->useCurrent();
        });

        DB::table('home_posts')->insert([
            'fulltext' => '<h3 style="text-align: left;">Drogeham</h3>
            <p>Het dorp Drogeham dat lokaal ook wel &lsquo;De Ham&rsquo; wordt genoemd, heeft ongeveer 1800 inwoners. Het ligt onder het Prinses Margrietkanaal in het westelijke deel van de gemeente Achtkarspelen in het noordoosten van Friesland. Onder Drogeham vallen ook de buurtschappen: Buweklooster, Hamshorn, Hamsterpein en Westerend. Het dorp is bekend om zijn vele grote evenementen die er jaarlijks worden georganiseerd zoals de gondelvaart op wielen, concours hippique en de ronde van de kerspelen.</p>
            <p>Drogeham heeft een goed voorzieningenniveau met onder andere een supermarkt, drogisterij, verfwinkel, cafetaria, bakkerij, pompstation, camping en een agrarische winkel met diervoeding, ijzerwaren en huishoudelijke artikelen. Daarnaast zijn er nog vele andere bedrijven gevestigd in Drogeham.</p>
            <p>In en rond het dorp zijn vier rijksmonumenten te bewonderen zoals een Kop-hals-rompboerderij, Klokkenstoel, Buweklooster, Walburgakerk en een Arbeiderswoning. Voor de sport- en natuurliefhebbers biedt de directe omgeving prachtige fiets- en wandelroutes, het Hossebos en het strand genaamd &lsquo;Schuilenburg&rsquo;</p>',
            'photo' => 'empty',
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
