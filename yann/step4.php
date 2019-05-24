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

    <!-- Questions si case (Box étudiante est cocher)-->
    <h1>Étape 4 : Question box étudiante </h1>

    <!-- Question 1 -->
    <div class="form-group">
      <label for="school_domains">Quelles est le votre domaine d’études ?</label><br>
      <input type="text" class="form-control" name="school_domains" id="name_domains">
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
      <label for="school_class">Dans quelles classe êtes vous ?</label><br>
      <input type="text" class="form-control" name="school_class" id="name_class">
    </div>
    <div class="input-group mb-3">
      <select class="custom-select" id="inputGroup">
        <option selected>Sélections</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>

    <!-- Question 3 -->
    <div class="form-group">
      <label for="school_genres">Quelles genres aimerez vous recevoir ?</label><br>
      <input type="text" class="form-control" name="school_genres" id="name_genres">
    </div>
    <div class="input-group mb-3">
      <select class="custom-select" id="inputGroup">
        <option selected>Sélections</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>

    <!-- Boutton -->

        <button >Envoyer</button>
  </body>
</html>
