<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel='stylesheet'>
    <script src="{{asset('js/app.js') }}" defer></script>
    <title>Page de la guilde</title>
</head>
<body>
    <div class="container-fluid">
    <a href="{{route('personnage.create')}}">Ajouter nouveau membre</a>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Pseudo</th>
            <th scope="col">Race</th>
            <th scope="col">Points de vie</th>
            <th scope="col">Armure</th>
            <th scope="col">Détail</th>
            <th scope="col">Propriétaire</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($personnages as $personnage)
          <tr>
            <th scope="row">{{$personnage->pseudo}}</th>
            <th scope="row">{{$personnage->race}}</th>
            <th scope="row">{{$personnage->specialisation->classe->point_de_vie}}</th>
            <th scope="row">{{$personnage->specialisation->classe->armure}}</th>
            <th scope="row"></th>
            <th scope="row">{{$personnage->proprietaire}}</th>
            <th scope="row">
                <a href="{{route("personnage.edit",$personnage->id)}}" class="btn btn-success">Modifier</a>
                <form action="{{route('personnage.destroy',$personnage->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" value='DELETE'>Supprimer</button>
                </form>
            </th>
          @endforeach

        </tbody>
      </table>
    </div>
</body>
</html>
