<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- BootStrap --->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Questions si case (Box culturel est cocher)-->
    <h1>Étape 6 : Question box culturel </h1>

    <!-- Question 1 -->
    <!-- Si on a pas le genres de  magazines enregistrer envoyé un mail d'alerte pour créer la catégorie avec ce magazines dedans-->
    <div class="form-group">
      <label for="magazines_genres">Quelles genres de magazines lisez-vous ?</label><br>
      <input type="text" class="form-control" name="magazines_genres" id="magazines">
    </div>
    <div class="input-group mb-3">
      <select class="custom-select" id="inputGroup">
        <option selected>Sélections</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>

    <!-- Question 2 -->
    <div class="form-group">
      <label for="choose">Aimeriez vous connaitre d’autres genres ?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="choose" id="yes" value="oui">
        <label class="form-check-label" for="yes">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="choose" id="no" value="non">
        <label class="form-check-label" for="no">non</label>
      </div>
    </div>

    <!-- Boutton -->

        <button >Envoyer</button>
  </body>
</html>
