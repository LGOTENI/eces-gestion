@extends("layouts.main")
@section("contenue")

<div class="container form-client">
    <br />

    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('quittance-enregistrement', [$idFacture, $id]) }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Quittance</h2>
                        <div class="form-group">
                            <input type="number" class="form-input" name="montant" id="nom" placeholder="Montant" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Enregistrer"/>
                        </div>
                        <div class="form-group ">
                            <a type="button" name="submit" id="submit" class="form-submit btn btn-danger text-danger" href="{{ route('list-facture', $id) }}">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
