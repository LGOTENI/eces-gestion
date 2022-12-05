@extends("layouts.main")
@section("contenue")
<div class="pt-5">
  <h2>LISTE DE TOUS LES CLIENTS ENREGISTRÉS</h2>
  <input class="form-control mt-4" id="myInput" type="text" placeholder="Recherche">

</div>

<br>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>N°</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody id="myTable">
  @foreach($clients as $client )
    <tr>
      <td>{{ $client->id }}</td>
      <td>{{ $client->nom_cli }}</td>
      <td>{{ $client->prenom }}</td>
      <td>
        <div class="container d-flex justify-content-around">
          <a name="" id="" class="btn btn-success" href="{{ route('client.show', $client->id) }}" role="button">Profil</a>
        </div>
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
