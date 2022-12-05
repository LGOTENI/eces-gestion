@extends("layouts.main") @section("contenue")

<div class="container form-client">
    <br />
    @if($data==null)
    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('enregistrer.store') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Nouvelle agence</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nom" id="nom" placeholder="Nom agence" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="departement" id="" placeholder="Departement" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="ville" placeholder="Ville" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Enregistrer"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div>
        <div class="alert alert-info alert-dismissible p-2 ">
            <button
                type="button"
                class="btn-close pt-2"
                data-bs-dismiss="alert"
            ></button>
            <div class="text-center">Bienvenu, commencons d'abord par enregistrer une nouvelle agence...!!!</div>
        </div>
    </div>
    @else
    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('client.store') }}" id="signup-form" class="signup-form">
                    @csrf
                        <h2 class="form-title">Nouveau client</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nom_cli" id="name" placeholder="Nom"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="prenom" id="" placeholder="Prénom"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="adresse" placeholder="Adresse"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="branchement" placeholder="Branchement"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Enregistrer"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    @if($client == null)
    <div>
        <div class="alert alert-info alert-dismissible p-2 ">
            <button
                type="button"
                class="btn-close pt-2"
                data-bs-dismiss="alert"
            ></button>
            <div class="text-center">Bravo, vous pouvez maintenant ajouter un nouveau client</div>
        </div>
    </div>
    @endif

    @if (\Session::has('success'))
    <div>
        <div class="alert alert-success alert-dismissible p-2 ">
            <button
                type="button"
                class="btn-close pt-2"
                data-bs-dismiss="alert"
            ></button>
            <div class="text-center">
            {!! \Session::get('success') !!}
            </div>
        </div>
    </div>
    @endif

    @endif
</div>

@endsection
