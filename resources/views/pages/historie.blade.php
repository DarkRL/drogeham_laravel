<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <x-header />
    <div class="parallax_fixed"></div>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-10">
                <div class="m-5">
                    <!-- <div>
                        <h2>Drogeham</h2>
                        <br>
                        <h6>De Hamster Ko</h6>
                        <p>Jarenlang werden er op de brink jaarlijks twee veemarkten gehouden. Volgens overlevering waren de koeien uit Drogeham XE “Drogeham”
                            en de omliggende Wouden wat lichter gebouwd dan de koeien van de klei. Daardoor ontstond de uitdrukking, als een koopman te weinig
                            voor een koe wilde betalen: it is gjin Droegehamster! In 1980 is er een beeld van 'de Hamster Ko', met een veekoopman en een boer, vlak bij de voormalige brink aan de Tsjerke Buorren geplaatst.
                        </p>
                    </div>
                    <div class="mt-4">
                        <h6>Asterham</h6>
                        <p>Wanneer Drogeham is ontstaan is niet bekend. In 1980 werd het duizendjarig bestaan gevierd, maar of Drogeham toen werkelijk zo oud was, kon niet met zekerheid vastgesteld worden.</p>

                        <p>De toren van de hervormde kerk stamt uit omstreeks 1225. In een decanaatsregister uit 1475 werd gesproken over Asterham alias Drogeham. De andere dorpen die toen in Achtkarspelen lagen, waren: Post (= Lutkepost),
                            Utpost ( = Buitenpost), Uptwysel (= Twijzel), Harkingekerke (= Harkema-Opeinde), de Sancto Augustino (= Augustinusga) , Suderhusum (= Surhuizum), Cortwolda (= Kortwoude) en Westerham vel Cottum (= Westerham ook wel Kooten).</p>

                        <p>De namen Westerham en Oosterham (Asterham) kunnen er op duiden dat Kooten en Drogeham vroeger één dorp vormden en dat Drogeham waarschijnlijk van Kooten is afgesplitst. Van Kooten is namelijk een oudere kerk bekend die bij de Oude Dijk stond, terwijl Drogeham, voor zover bekend, geen oudere kerk heeft gehad.</p>
                    </div>
                    <div class="mt-4">
                        <h6>Hoge zandrug</h6>
                        <p>
                            Drogeham is net als de andere oude dorpen in Achtkarspelen ontstaan op een hoge zandrug. De Walburga-kerk staat op het hoogste punt, namelijk wel 5 meter boven NAP. De hoge ligging klinkt ook door in de naam; Drogeham betekent 'gebied op het droge'.
                        </p>
                        <p>
                            Van noord naar zuid gezien wordt Drogeham steeds hoger. In het de noorden, de mieden, is het laag. Vroeger was dit gebied alleen in de zomer toegankelijk, de landerijen waren in gebruik als hooiland of werden verveend. Naar het zuiden toe, richting Boskwei, wordt het steeds hoger. Hier lagen vroeger de bouwlanden. Tussen de hooilanden en de bouwlanden lagen de weilanden.
                        </p>
                    </div>
                    <div class="mt-4">
                        <h6>Hamsterpein, Kromelle en Kleasterbreed</h6>
                        <p>
                            De Hamsterpein, de Kromelle en It Kleasterbreed vormden vroeger het centrum van het dorp Harkema-Opeinde. Harkema-Opeinde was rond 1200 van Augustinusga afgesplitst; het lag op het einde van Augustinusga. In de 13e eeuw stichtte Bouwe Harkema hier een klooster, het Buweklooster.
                        </p>
                        <p>
                            Al eerder had hij een kapel op zijn land laten bouwen. Deze kapel is later uitgegroeid tot dorpskerk en toen kreeg Harkema-Opeinde, of Harkingekerke zoals het toen ook wel genoemd werd, de status van dorp. In 1921 is het oude Harkema-Opeinde bij Drogeham gevoegd. Ten zuiden van het oude dorp was op de heide een nieuw dorp ontstaan, dat voortaan de naam Harkema-Opeinde kreeg.
                        </p>
                    </div>
                    <div class="mt-4">
                        <h6>De Tegenwoordige Staat van Drogeham in 1786</h6>
                        <p>
                            In het boek <i>De Tegenwoordige Staat van Friesland</i> uit 1786 wordt Drogeham als volgt omschreven: 'Drogeham heeft een middelbaaren omtrek, bevattende 27 stemdraagende plaatsen. De kerkbuurt ligt ten Zuiden en Zuidwesten der kerk, en is van dezelve door eene groote ruimte afgescheiden.
                        </p>
                        <p>
                        Aan 't Zuidoosten staan ook veele huizen en plantagien aan den weg, die, alomme met boomen beplant, zeer aangenaam is; een weinig ten Zuiden van dien ligt het buurtje Hamshorn, gelyk ten Westen het buurtje Westerend. Alles in vermaakelyke en vruchtbaare bouwlanden, die het dorp van alle kanten omringen. De Hamster akkers loopen tot aan Tietjerksteradeel in 't Zuidwesten, terwyl zy zich ten Oosten tot aan Opeinde strekken en ten Noorden van de Kootster landen door 't Kolonels diepts gescheiden worden. Onder dit dorp is voor eenige jaaren, door den Raadsheer Mr. J.L. Dois van Haersma, een fraaie buitenplaats gesticht'.
                        </p>
                    </div> -->

                    <div class="custom_hidden">
                        @foreach ($posts as $post)
                        {!! html_entity_decode($post->fulltext) !!}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    <x-footer />
</body>

</html>