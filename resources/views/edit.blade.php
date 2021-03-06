<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel='stylesheet'>
    <script src="{{asset('js/app.js') }}" defer></script>
    <title>Modification d'un personnage de la guilde</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div>
                    <h1 class="mt-5 text-center font-weight-bold">Modification d'un membre de la guilde</h1>
                </div>
                <form action="{{route('personnage.update',$personnages->id)}}" method="post"
                    enctype="multipart/form-data" name="formulaire" class="mt-5">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div>
                        <h2>Pseudo</h2>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Entrez le pseudo" name="pseudo"
                            value="{{$personnages->pseudo}}" required>
                    </div>
                    <div>
                        <h2>Propriétaire</h2>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Entrez le nom du propriétaire"
                            value="{{$personnages->proprietaire}}" name="proprietaire" required>
                    </div>
                    <div>
                        <h2>Race</h2>
                    </div>
                    <select class="form-control" name="race" value="{{$personnages->race}}" required>
                        <option>{{$personnages->race}}</option>
                        <option value="Humain">Humain</option>
                        <option value="Elfe">Elfe</option>
                        <option value="Nain">Nain</option>
                        <option value="Orc">Orc</option>
                    </select>
                    <div>
                        <h2 class="mt-3">Classe</h2>
                    </div>
                    <select class="form-control" name="nom_classe" id="classe"
                        value=" {{$personnages->specialisation->classe->nom_classe}} " required>
                        @foreach($classes as $classe)
                        <option value={{$classe->id}}
                            {{$personnages->specialisation->classe_id==$classe->id?"selected":''}}>
                            {{$classe->nom_classe}}</option>
                        @endforeach
                    </select>
                    <h2 class="mt-3" id="titreSpecialisation">Spécialisation</h2>
                    <select class="form-control linked-select" name="specialisation_id" id="specialisation" required>
                        @foreach($specialisations as $specialisation)
                        @if($personnages->specialisation->classe_id == $specialisation->classe->id)
                        <option value="{{$specialisation->id}}"
                            {{$personnages->specialisation_id==$specialisation->id?"selected":''}}>
                            {{$specialisation->nom_specialisation}}</option>
                        @endif
                        @endforeach
                    </select>

                    <div class="form-group text-center mt-5">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <a href="{{route('personnage.index')}}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
            </div>

            <script>
                // Fonctions permettant d'adapter les spécialisations en fonction des classes dans le sélecteur.
                var classe = document.getElementById('classe');
                var specialisation = document.getElementById('specialisation');
                classe.addEventListener('change', function (e) {
                    e.preventDefault();
                    axios.get('/selecteur/specialisation', {
                            params: {
                                data: this.value
                            }
                        })
                        .then(function (reponse) {
                            selectSpecialisation(reponse.data.specialisation);
                        })
                        .catch(function (erreur) {
                            console.log(erreur);
                        });
                })

                function selectSpecialisation(responseTableau) {
                    specialisation.innerHTML = '';
                    for (i = 0; i < responseTableau.length; i++) {
                        specialisation.innerHTML += '<option value="' + responseTableau[i]['id'] + '">' +
                            responseTableau[i][
                                'nom_specialisation'
                            ] + '</option>';
                    }
                }
            </script>

</body>

</html>
