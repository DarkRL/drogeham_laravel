<header class="sticky-top">
    <nav class="py-2 bg-light ">
        <div class="container d-flex flex-wrap text-algin align-items-center justify-content-center">
            <a href={{route('page', ['page' => 'home'])}}><img src="{{URL::asset("./img/wapen.svg")}}" alt="Wapen Drogeham" title="Drogeham" height="50" /></a>
            <ul class="nav mx-auto">
                <li class="nav-item"><a href={{route('page', ['page' => 'home'])}} class="nav-link link-dark " aria-current="page">Home</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'agenda'])}} class="nav-link link-dark ">Agenda</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'actueel'])}} class="nav-link link-dark ">Actueel</a></li>
                <li class="nav-item"><a href={{route('page', ['page' => 'projecten'])}} class="nav-link link-dark ">Projecten</a></li>
                <div class="dropdown nav-link link-dark">
                    <a class="text-decoration-none text-reset" href="{{route('page', ['page' => 'meyd'])}}">
                        <div class="dropdown-toggle" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            MEYD
                        </div>
                    </a>
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
                <li class="nav-item"><a href={{route('page', ['page' => 'contact'])}} class="nav-link link-dark ">Contact</a></li>
            </ul>
            <a href={{route('page', ['page' => 'meyd'])}}><img src="{{URL::asset("./img/MEYD_drogeham.png")}}" alt="Logo MEYD" title="MEYD" height="60" /></a>
        </div>
    </nav>
</header>