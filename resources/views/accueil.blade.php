<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel='stylesheet'>
    <link href="{{asset('css/guilde.css')}}" rel='stylesheet'>
    <script src="{{asset('js/app.js') }}" defer></script>
    <title>Page de la guilde</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="boutonAtt">
                    <a class="btn btn-primary" href="{{route('personnage.create')}}">Ajouter nouveau personnage</a>
                    <a class="btn btn-primary" href="{{route('personnage.tpc')}}">Trier par Classe</a>
                    <a class="btn btn-primary" href="{{route('personnage.tps')}}">Trier par Spécialisation</a>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Pseudo</th>
                            <th scope="col" class="text-center">Race</th>
                            <th scope="col" class="text-center">Points de vie</th>
                            <th scope="col" class="text-center">Armure</th>
                            <th scope="col" class="text-center">Détail</th>
                            <th scope="col" class="text-center">Propriétaire</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnages as $personnage)
                        <tr>
                            <th scope="row" class="text-center">
                                <?php echo App\Http\Controllers\PersonnageController::couleurPseudo($personnage)?>
                            </th>
                            <th scope="row" class="text-center"
                                style="background-color:{{$personnage->donneeClasse->couleur}};">
                                {{$personnage->race}}</th>
                            <th scope="row" class="text-center"
                                style="background-color:{{$personnage->donneeClasse->couleur}};">
                                {{$personnage->specialisation->classe->point_de_vie}}</th>
                            <th scope="row" class="text-center"
                                style="background-color:{{$personnage->donneeClasse->couleur}};">
                                {{$personnage->specialisation->classe->armure}}</th>
                            <th scope="row" style="background-color:{{$personnage->donneeClasse->couleur}};">
                                <img src="{{asset("image/".$personnage->specialisation->icone)}}" alt="">
                                {{$personnage->donneeClasse->detail()}} </th>
                            <th scope="row" class="text-center"
                                style="background-color:{{$personnage->donneeClasse->couleur}};">
                                {{$personnage->proprietaire}}</th>
                            <th scope="row" class="text-center">
                                <a href="{{route("personnage.edit",$personnage->id)}}"
                                    class="btn btn-success btnAction">Modifier</a>
                                <form action="{{route('personnage.destroy',$personnage->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btnAction" type="submit"
                                        value='DELETE'>Supprimer</button>
                                </form>
                            </th>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
