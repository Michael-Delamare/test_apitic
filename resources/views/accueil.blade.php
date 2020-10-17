<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel='stylesheet'>
    <script src="{{asset('js/app.js') }}" defer></script>
    <title>Document</title>
</head>
<body>
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
            <th scope="row">{{$personnage->point_de_vie}}</th>
            <th scope="row">{{$personnage->armure}}</th>
            <th scope="row"></th>
            <th scope="row">{{$personnage->Propriétaire}}</th>
            <th scope="row"></th>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
