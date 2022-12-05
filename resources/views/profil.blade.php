@extends("layouts.main")
@section("contenue")
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-md-12">
        <div class="card user-card-full">
            <div class="row m-l-0 m-r-0">
                <div class="col-sm-4 bg-c-lite-green user-profile">
                    <div class="card-block text-center text-white">
                        <div class="m-b-25">
                            <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                        </div>
                        <h6 class="f-w-600">
                        {{ $client->nom_cli }}
                        {{ $client->prenom }}
                        </h6>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                    Delete
                                </button>
                        <a class=" btn btn-success mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16" href="#">Update</a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informations</h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Branchement</p>
                                <h6 class="text-muted f-w-400">{{ $client->branchement }}</h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Adresse</p>
                                <h6 class="text-muted f-w-400">{{ $client->adresse }}</h6>
                            </div>
                        </div>
                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Services</h6>
                        <div class="services">
                            <div class="">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Générer facture
                                </button>
                            </div>
                            <div class="">
                                <a class="btn btn-secondary" href="{{ route('list-facture', $client->id) }}">Liste facture</a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    Générer compteur
                                </button>
                            </div>
                            <div class="">
                                <a class="btn btn-dark" href="{{ route('list-compteur', $client->id) }}">Liste compteur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@if (\Session::has('success'))
    <div>
        <div class="alert alert-info alert-dismissible p-2 ">
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
<!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h2 class="modal-title text-white text-center" id="exampleModalLabel">Veillez remplir le formulaire</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST"
                action="{{ route('facture', $client->id ) }}">
                @csrf
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Période
                    <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="form6Example1" class="form-control" placeholder="Saisir la période"
                      name="periode" required />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Référence paiement
                    <span class="text-danger">*</span>

                    </label>
                    <input type="text" id="form6Example1" class="form-control" placeholder="Saisir la reference"
                      name="ref_paiment" required />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Delai réglement
                    <span class="text-danger">*</span>

                    </label>
                    <input type="date" id="form6Example1" class="form-control"
                      name="delai_paiment" required/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
                  <button type="submit" class="btn bg-primary text-white">Enregistrer</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      {{-- Modal 2 --}}
      <!-- Modal -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h2 class="modal-title text-white text-center" id="exampleModalLabel">Veillez remplir le formulaire</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST"
                action="{{ route('compteur', $client->id ) }}">
                @csrf
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Ancien index
                    <span class="text-danger">*</span>

                    </label>
                    <input type="number" id="form6Example1" class="form-control" placeholder="Ancien index"
                      name="index_ancien" required />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Nouveau index
                    <span class="text-danger">*</span>

                    </label>
                    <input type="number" id="form6Example1" class="form-control" placeholder="Nouveau index"
                      name="index_nouveau" required />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Puissance
                    <span class="text-danger">*</span>

                    </label>
                    <input type="number" id="form6Example1" class="form-control"
                      name="puissance" placeholder="Puissance" required />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Nombre de mois
                    <span class="text-danger">*</span>

                    </label>
                    <input type="number" id="form6Example1" class="form-control"
                      name="nbre_mois" placeholder="Nombre de mois" required />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label mb-0 mt-2" for="form6Example1">Prix unitaire
                    <span class="text-danger">*</span>
                    
                    </label>
                    <input type="number" id="form6Example1" class="form-control"
                      name="prix_unitaire" placeholder="Prix unitaire" required />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
                  <button type="submit" class="btn bg-primary text-white">Enregistrer</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
       <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h2 class="modal-title text-white text-center" id="exampleModalLabel">voulez-vous vraiment supprimer ce client?</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-footer d-flex justify-content-around">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <a type="submit" class="btn bg-warning text-white" href="{{ route('client-delete', $client->id) }}">Oui</a>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
@endsection
