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
        Schema::create('history_posts', function (Blueprint $table) {
            $table->id();
            $table->text('fulltext');
            $table->timestamp('datetime')->useCurrent();
        });

        DB::table('history_posts')->insert([
            'fulltext' => "<h2>Drogeham</h2>
            <p>&nbsp;</p>
            <h4>De Hamster Ko</h4>
            <p>Jarenlang werden er op de brink jaarlijks twee veemarkten gehouden. Volgens overlevering waren de koeien uit Drogeham XE &ldquo;Drogeham&rdquo; en de omliggende Wouden wat lichter gebouwd dan de koeien van de klei. Daardoor ontstond de uitdrukking, als een koopman te weinig voor een koe wilde betalen: it is gjin Droegehamster! In 1980 is er een beeld van 'de Hamster Ko', met een veekoopman en een boer, vlak bij de voormalige brink aan de Tsjerke Buorren geplaatst.</p>
            <h4><br>Asterham</h4>
            <p>Wanneer Drogeham is ontstaan is niet bekend. In 1980 werd het duizendjarig bestaan gevierd, maar of Drogeham toen werkelijk zo oud was, kon niet met zekerheid vastgesteld worden.</p>
            <p>De toren van de hervormde kerk stamt uit omstreeks 1225. In een decanaatsregister uit 1475 werd gesproken over Asterham alias Drogeham. De andere dorpen die toen in Achtkarspelen lagen, waren: Post (= Lutkepost), Utpost ( = Buitenpost), Uptwysel (= Twijzel), Harkingekerke (= Harkema-Opeinde), de Sancto Augustino (= Augustinusga) , Suderhusum (= Surhuizum), Cortwolda (= Kortwoude) en Westerham vel Cottum (= Westerham ook wel Kooten).</p>
            <p>De namen Westerham en Oosterham (Asterham) kunnen er op duiden dat Kooten en Drogeham vroeger &eacute;&eacute;n dorp vormden en dat Drogeham waarschijnlijk van Kooten is afgesplitst. Van Kooten is namelijk een oudere kerk bekend die bij de Oude Dijk stond, terwijl Drogeham, voor zover bekend, geen oudere kerk heeft gehad.</p>
            <h4><br>Hoge zandrug</h4>
            <p>Drogeham is net als de andere oude dorpen in Achtkarspelen ontstaan op een hoge zandrug. De Walburga-kerk staat op het hoogste punt, namelijk wel 5 meter boven NAP. De hoge ligging klinkt ook door in de naam; Drogeham betekent 'gebied op het droge'.</p>
            <p>Van noord naar zuid gezien wordt Drogeham steeds hoger. In het de noorden, de mieden, is het laag. Vroeger was dit gebied alleen in de zomer toegankelijk, de landerijen waren in gebruik als hooiland of werden verveend. Naar het zuiden toe, richting Boskwei, wordt het steeds hoger. Hier lagen vroeger de bouwlanden. Tussen de hooilanden en de bouwlanden lagen de weilanden.</p>
            <h4><br>Hamsterpein, Kromelle en Kleasterbreed</h4>
            <p>De Hamsterpein, de Kromelle en It Kleasterbreed vormden vroeger het centrum van het dorp Harkema-Opeinde. Harkema-Opeinde was rond 1200 van Augustinusga afgesplitst; het lag op het einde van Augustinusga. In de 13e eeuw stichtte Bouwe Harkema hier een klooster, het Buweklooster.</p>
            <p>Al eerder had hij een kapel op zijn land laten bouwen. Deze kapel is later uitgegroeid tot dorpskerk en toen kreeg Harkema-Opeinde, of Harkingekerke zoals het toen ook wel genoemd werd, de status van dorp. In 1921 is het oude Harkema-Opeinde bij Drogeham gevoegd. Ten zuiden van het oude dorp was op de heide een nieuw dorp ontstaan, dat voortaan de naam Harkema-Opeinde kreeg.</p>
            <h4><br>De Tegenwoordige Staat van Drogeham in 1786</h4>
            <p>In het boek <em>De Tegenwoordige Staat van Friesland</em> uit 1786 wordt Drogeham als volgt omschreven: 'Drogeham heeft een middelbaaren omtrek, bevattende 27 stemdraagende plaatsen. De kerkbuurt ligt ten Zuiden en Zuidwesten der kerk, en is van dezelve door eene groote ruimte afgescheiden.</p>
            <p>Aan 't Zuidoosten staan ook veele huizen en plantagien aan den weg, die, alomme met boomen beplant, zeer aangenaam is; een weinig ten Zuiden van dien ligt het buurtje Hamshorn, gelyk ten Westen het buurtje Westerend. Alles in vermaakelyke en vruchtbaare bouwlanden, die het dorp van alle kanten omringen. De Hamster akkers loopen tot aan Tietjerksteradeel in 't Zuidwesten, terwyl zy zich ten Oosten tot aan Opeinde strekken en ten Noorden van de Kootster landen door 't Kolonels diepts gescheiden worden. Onder dit dorp is voor eenige jaaren, door den Raadsheer Mr. J.L. Dois van Haersma, een fraaie buitenplaats gesticht'.</p>",
            'datetime' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_posts');
    }
};
