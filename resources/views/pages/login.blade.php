<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body class="bg-dark">
    <div class="container bg-primary">
        <section class="vh-100 gradient-custom">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                            <img src="https://www.drogeham.com/assets/img/wapen.svg" alt="Wapen Drogeham" title="Drogeham" height="50"/>
                                <div class="mb-md-5 mt-md-5 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Voer hier uw email en wachtwoord in!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-2">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Wachtwoord</label>
                                    </div>

                                    <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">Wachtwoord vergeten?</a></p>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>