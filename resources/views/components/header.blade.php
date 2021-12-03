<div id="menu" class="is-flex is-justify-content-flex-start is-flex-direction-column">
    <section class="w-100 is-flex is-justify-content-space-between">
        <a href="/">
            <i class="fas fa-home fa-2x"></i>
        </a>
        <h3>
            {{ $pageTitle }}
        </h3>


        <div class="loggedAs">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="loggedAs" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Connecté en tant que Théo
                </a>

                <div class="dropdown-menu" aria-labelledby="loggedAs">
                    <a class="dropdown-item" href="#">Mon Profil</a>
                </div>
            </div>
        </div>
    </section>
    <section class="is-flex is-justify-content-space-between">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="domains" data-bs-toggle="dropdown"
               aria-expanded="false">
                Domaines
            </a>

            <div class="dropdown-menu w-100" aria-labelledby="domains">
                @foreach(\App\Models\Domain::all() as $domain)
                    <a class="dropdown-item" href="/domain/{{$domain->slug}}/practices">{{$domain->name}}</a>
                @endforeach
            </div>
        </div>
    </section>

</div>
