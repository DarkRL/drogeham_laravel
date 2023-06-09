<header class="sticky-top">
    <nav class="py-2 bg-light navbar-expand-xxl d-flex align-items-start">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="{{route('home')}}"><img src="{{URL::asset('/img/wapen.svg')}}" alt="Wapen Drogeham" title="Drogeham" height="50" /></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="menu d-xxl-none list-unstyled text-center ">
                    <li class="nav-item text-decoration-none mt-4 p-1  "><a href="{{route('home')}}" class="nav-link link-dark link_header_class" id="homepagelinkid" aria-current="page"><span class="hover-underline-animation hover-underline-grey">Home</span></a></li>
                    <li class="nav-item text-decoration-none p-1"><a href="{{route('agenda')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Agenda</span></a></li>
                    <li class="nav-item text-decoration-none p-1"><a href="{{route('actueel')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Actueel</span></a></li>
                    <li class="nav-item text-decoration-none p-1"><a href="{{route('projecten')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Projecten</span></a></li>

                    <li class="nav-item text-decoration-none p-1"><a href="{{route('plaatselijkbelang')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Plaatselijk belang</span></a></li>
                    <li class="nav-item text-decoration-none p-1"><a href="{{route('brinkpraat')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Brinkpraat</span></a></li>
                    <li class="nav-item text-decoration-none p-1"><a href="{{route('historie')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Historie</span></a></li>
                    <li class="nav-item text-decoration-none p-1"><a href="{{route('contact')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Word lid</span></a></li>
                    <div class="bg-light-custom">
                        <li class="nav-item text-decoration-none p-1"><a href="{{route('meydinfo')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">
                                    MEYD
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                        <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                    </svg>
                                </span></a></li>
                        @foreach ($meyd as $record)
                        <li class="nav-item text-decoration-none p-1"><a href="{{ route('meyd.meydpost', ['pagename' => $record->pagename]) }}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">{{ $record->headline }}</span></a></li>
                        @endforeach
                    </div>
                </ul>
                <ul class="nav mx-auto d-none d-xxl-flex">

                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link link-dark link_header_class" id="homepagelinkid" aria-current="page"><span class="hover-underline-animation hover-underline-grey">Home</span></a></li>
                    <li class="nav-item"><a href="{{route('agenda')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Agenda</span></a></li>
                    <li class="nav-item"><a href="{{route('actueel')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Actueel</span></a></li>
                    <li class="nav-item"><a href="{{route('projecten')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Projecten</span></a></li>
                    <div class="dropdown w-12 text-center nav-link">
                        <a class="text-decoration-none link-dark link_header_class" href="{{route('meydinfo')}}">
                            <div class="dropdown-toggle" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                                MEYD
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item nav-link link-dark ink-hover-bg-black" href="{{route('meydinfo')}}">MEYD Algemeen</a></li>
                            @foreach ($meyd as $record)
                            <li><a class="dropdown-item nav-link link-dark ink-hover-bg-black" href="{{ route('meyd.meydpost', ['pagename' => $record->pagename]) }}">{{ $record->headline }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <li class="nav-item"><a href="{{route('plaatselijkbelang')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Plaatselijk belang</span></a></li>
                    <li class="nav-item"><a href="{{route('brinkpraat')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Brinkpraat</span></a></li>
                    <li class="nav-item"><a href="{{route('historie')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Historie</span></a></li>
                    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link link-dark link_header_class"><span class="hover-underline-animation hover-underline-grey">Word lid</span></a></li>
                </ul>
            </div>
            <a class="d-none d-xxl-flex" href="{{route('meydinfo')}}"><img src="{{URL::asset('/img/MEYD_drogeham.png')}}" alt="Logo MEYD" title="MEYD" height="60" /></a>
        </div>
        <button class="navbar-toggler d-xxl-none p-2 position-absolute " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>

        </button>
    </nav>
    <script>
        $(document).ready(function() {
            if (location.pathname !== "/") {
                $("a[href*='" + location.pathname + "'].link_header_class").addClass("text-primary");
            } else {
                $("#homepagelinkid").addClass("text-primary");
            }
        });
    </script>
</header>