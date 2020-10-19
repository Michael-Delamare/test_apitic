 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="{{asset('css/app.css')}}" rel='stylesheet'>
     <script src="{{asset('js/app.js') }}" defer></script>
     <title>Création d'un personnage de la guilde</title>
 </head>

 <body>
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-4 offset-lg-4">
                 <div>
                     <h1 class="text-center mt-5 font-weight-bold">Nouveau membre de la guilde</h1>
                 </div>
                 <form action="{{route('personnage.store')}}" method="POST" enctype="multipart/form-data"
                     name="formulaire" class="mt-5">
                     @csrf
                     {{ method_field('POST') }}
                     <div>
                         <h2>Pseudo</h2>
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Entrez le pseudo" name="pseudo" required>
                     </div>
                     <div>
                         <h2>Propriétaire</h2>
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Entrez le nom du propriétaire"
                             name="proprietaire" required>
                     </div>
                     <div>
                         <h2>Race</h2>
                     </div>
                     <select class="form-control" name="race" required>
                         <option>Selectionner une race</option>
                         <option>Humain</option>
                         <option>Elfe</option>
                         <option>Nain</option>
                         <option>Orc</option>
                     </select>
                     <div>
                         <h2 class="mt-3">Classe</h2>
                     </div>
                     <select class="form-control" name="nom_classe" id="classe" data-target="#specialisation" required>
                         <option>Selectionner une classe</option>
                         @foreach($classes as $classe)
                         <option value={{$classe->id}}>{{$classe->nom_classe}}</option>
                         @endforeach
                     </select>
                     <h2 class="mt-3" id="titreSpecialisation" style="display: none;">Spécialisation</h2>
                     <select class="form-control linked-select" name="specialisation_id" id="specialisation"
                         style="display: none;" required>
                         <option>Selectionner une spécialisation</option>
                     </select>
                     <div class="form-group mt-5 text-center">
                         <button type="submit" class="btn btn-primary">Envoyer</button>
                         <a href="{{route('personnage.index')}}" class="btn btn-danger">Annuler</a>
                     </div>
                 </form>
             </div>
         </div>
     </div>

     <script>
         var classe = document.getElementById('classe');
         var specialisation = document.getElementById('specialisation');
         var titreSpecialisation = document.getElementById('titreSpecialisation');

         classe.addEventListener('change', function (e) {
             e.preventDefault();
             axios.get('/selecteur/specialisation', {
                     params: {
                         data: this.value
                     }
                 })
                 .then(function (reponse) {
                     //console.log(reponse.data.specialisation);
                     selectSpecialisation(reponse.data.specialisation);
                 })
                 .catch(function (erreur) {
                     console.log(erreur);
                 });
         })

         function selectSpecialisation(responseTableau) {
             titreSpecialisation.style.display = null;
             specialisation.style.display = null;
             specialisation.innerHTML = '';
             for (i = 0; i < responseTableau.length; i++) {
                 specialisation.innerHTML += '<option value="' + responseTableau[i]['id'] + '">' + responseTableau[i][
                     'nom_specialisation'
                 ] + '</option>';
             }
         }

     </script>

 </body>

 </html>
