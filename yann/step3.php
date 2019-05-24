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

    <h1>Étape 3 : Question lié à la Box</h1>

    <!-- Question 1 -->
    <!-- Si on a pas l'auteur enregistrer envoyé un mail d'alerte pour créer la fiche de l'auteur-->
      <div class="form-group">
        <label for="favourite_autor">Quels est votre auteur favoris ?</label>
        <input type="text" class="form-control" name="author_name" id="favourite_autor">
      </div>

    <!-- Question 2 -->
    <!-- Si on a pas le livre enregistrer envoyé un mail d'alerte pour créer la fiche du livre-->
      <div class="form-group">
        <label for="favourite_book">Quels est votre livre préférer ?</label>
        <input type="text" class="form-control" name="book_name" id="favourite_book">
      </div>

    <!-- Question 3 -->
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

    <!-- Question 4 -->
    <div class="form-group">
      <label for="favourite_genres">Quelles sont vos catégories préférentielles ?</label><br>
      <input type="text" class="form-control" name="genres_name" id="favourite_genres">
    </div>
    <div class="input-group mb-3">
      <select class="custom-select" id="inputGroup">
        <option selected>Sélections</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>

    <!-- Question 5 -->
    <!-- Si oui afficher une case ou la personne peu ecrire le nom de son magazines -->
    <!-- Si on a pas le magazines enregistrer envoyé un mail d'alerte pour créer la fiche du magazines-->
    <div class="form-group">
      <label for="choose">Lisez vous des magazines ?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="choose_yes_no" id="yes" value="option1">
        <label class="form-check-label" for="yes">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="choose_yes_no" id="no" value="option2">
        <label class="form-check-label" for="no">non</label>
      </div>
    </div>

    <!-- Question 6 -->
    <!-- Si oui afficher une case ou la personne peu ecrire le nom de la série -->
    <!-- Si on a pas la serie enregistrer envoyé un mail d'alerte pour créer la fiche de la série-->
    <div class="form-group">
      <label for="choose">Regarder vous des série ?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="choose_yes_no" id="yes" value="option1">
        <label class="form-check-label" for="yes">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="choose_yes_no" id="no" value="option2">
        <label class="form-check-label" for="no">non</label>
      </div>
    </div>

    <!-- Boutton -->
        <button >Envoyer</button>

  </body>
</html>
