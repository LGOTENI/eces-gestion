@extends("layouts.main")
@section("contenue")
<div class="pt-5">
<div>
<a class="btn btn-dark" href="{{ route('client.show', $retour) }}">Retour</a>
{{-- <a class="btn btn-secondary" href="{{ route('list-quittance', $retour) }}">Liste quittance</a> --}}
</div>
  <h2>LISTE DES FACTURES GENERÉES</h2>
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
      <th>Periode</th>
      <th>Reference</th>
      <th>Delai reglement</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody id="myTable">
  @foreach($factures as $facture )
    <tr>
      <td>{{ $facture->id }}</td>
      <td>{{ $facture->periode }}</td>
      <td>{{ $facture->ref_paiment }}</td>
      <td>{{ $facture->delai_paiment }}</td>
      <td class="container d-flex justify-content-around">
        <a class="btn btn-success" href="#">Imprimer</a>
        <a class="btn btn-secondary" href="{{ route('quittance', [$retour, $facture->id]) }}">Generer quittance</a>
        <a class="btn btn-dark" href="{{ route('list-quittance', [$facture->id, $retour]) }}">Liste quittance</a>
        <a class="btn btn-danger" href="{{ route('delete-facture', [$facture->id, $retour]) }}">Delete</a>
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
