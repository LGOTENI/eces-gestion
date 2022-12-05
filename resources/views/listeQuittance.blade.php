@extends("layouts.main")
@section("contenue")
<div class="pt-5">
<div>
<a class="btn btn-dark" href="{{ route('list-facture', $retour) }}">Retour</a>
</div>
  <h2>LISTE DES QUITTANCES GENERÉES</h2>
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
  <input class="form-control mt-4" id="myInput" type="text" placeholder="Recherche">
</div>
<br>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>N°</th>
      <th>Montant</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody id="myTable">
  @foreach($factures as $facture )
    <tr>
      <td>{{ $facture->id }}</td>
      <td>{{ $facture->montant }}</td>
      <td class="container d-flex justify-content-around">
        <a class="btn btn-success" href="{{ route('client.show', $retour) }}">Imprimer</a>
         <a class="btn btn-danger" href="{{ route('delete-quittance', [$facture->id, $retour, $facture->redevencer]) }}">Delete</a>
      <a class="btn btn-primary" href="#">Update</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<script>
  $(document).ready(function () {
    $("#myInput").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

@endsection
