<header>
    <nav class="py-2 bg-light sticky-top">
        <div class="container d-flex flex-wrap text-algin align-items-center justify-content-center">
            <a href={{route('page', ['page' => 'home'])}}><img src="{{URL::asset("./img/wapen.svg")}}" alt="Wapen Drogeham" title="Drogeham" height="50" /></a>
            <ul class="nav mx-auto">
                <li class="nav-item"><a href={{route('page', ['page' => 'home'])}} class="nav-link link-dark " aria-current="page">Home</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'agenda'])}} class="nav-link link-dark ">Agenda</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'actueel'])}} class="nav-link link-dark ">Actueel</a></li>
                <div class="dropdown nav-link link-dark">
                    <div class="dropdown-toggle" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        MEYD
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item nav-link link-dark ink-hover-bg-black" href="#">Hamster Hulp</a></li>
                        <li><a class="dropdown-item nav-link link-dark ink-hover-bg-black" href="#">Fit en Sûn</a></li>
                        <li><a class="dropdown-item nav-link link-dark ink-hover-bg-black" href="#">Doarpskeamer</a></li>
                        <li><a class="dropdown-item nav-link link-dark ink-hover-bg-black" href="#">Activiteiten 2022-2023</a></li>
                    </ul>
                </div>
                <li class="nav-item"><a href={{route('page', ['page' => 'plaatselijkbelang'])}} class="nav-link link-dark ">Plaatselijk belang</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'brinkpraat'])}} class="nav-link link-dark ">Brinkpraat</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'historie'])}} class="nav-link link-dark ">Historie</a></li>

            </ul>
            <img src="{{URL::asset("./img/MEYD_drogeham.png")}}" height="60" />
        </div>
    </nav>
    <div style="align-items:center" class="d-flex flex-column justify-content-around parallax">
        <div></div>
        <div class="container h-100">
            <div class="text-center text-white text-capitalize">
                <h1>Plaatselijk belang drogeham</h1>
                <button type="button" class="btn btn-primary rounded-pill">Word Lid</button>
            </div>
        </div>
        <div style="align-items:center" class="text-center text-capitalize d-flex flex-column">
            <a href="#home" style="text-decoration:none;" href="#home"><span class="text-white pb-3">Onze projecten</span></a>
            <a href="#home"><img class="arrows" src="{{URL::asset("./img/arrow-down.svg")}}" alt="Arrow-down" height="35" width="35" /></a>
        </div>
    </div>
</header>