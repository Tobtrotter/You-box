<?php
// Session qui reste ouverte
session_start();


$errors = array();

if(!(empty($_POST))){
  $post = array_map('trim', array_map('strip_tags', $_POST)); // Securise les données

  if(empty($post['author_name'])){
    $errors[] = 'Vous devez renseigner votre auteur';
  }
  if(empty($post['book_name'])){
    $errors[] = 'Vous devez renseigner votre livre';
  }
  if(empty($post['choose'])){
    $errors[] = 'Vous devez sélectionner Oui ou Non';
  }
  if(empty($post['genre_name'])){
    $errors[] = 'Vous devez sélectionner votre catégorie';
  }
  if(empty($post['read_magazine'])){
    $errors[] = 'Vous devez sélectionner Oui ou Non';
  }
  if(empty($post['look_serie'])){
    $errors[] = 'Vous devez sélectionner Oui ou Non';
  }

  if(count($errors) == 0){
    // Enregistrement en base de données avec INSERT
    $res = $bdd->prepare('INSERT INTO step3(author_name, book_name, choose, genre_name, read_magazine, look_serie) VALUES (:author_name, :book_name, :choose, :genre_name, :read_magazine, :look_serie)');

    $res->bindValue(':author_name', $post['author_name'], PDO::PARAM_STR);
    $res->bindValue(':book_name', $post['book_name']);
    $res->bindValue(':choose', $post['choose']);
    $res->bindValue(':genre_name', $post['genre_name']);
    $res->bindValue(':read_magazine', $post['read_magazine']);
    $res->bindValue(':look_serie', $post['look_serie']);

    // J'execute (donc ça sauvegarde)
    $res->execute();

	}
	else {
		// Si la vaiable $form_valid vaut "false" alors le tableau $errors contient des erreurs
		$form_valid = false;
	}

    // Redirection
    header('Location: step7.php');
  }

 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- BootStrap --->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Formulaire</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <div class="contact-form">
      <h1>Box Classique </h1>


      <!-- Question 1 -->
      <!-- Si on a pas l'auteur enregistrer envoyé un mail d'alerte pour créer la fiche de l'auteur-->
      <div class="form-group">
        <label for="favourite_autor">Quels est votre auteur favoris ?</label>
        <input type="text" name="author_name" id="favourite_autor" placeholder="Rentrez votre auteur favoris">
      </div>

    <!-- Question 2 -->
    <!-- Si on a pas le livre enregistrer envoyé un mail d'alerte pour créer la fiche du livre-->
      <div class="form-group">
        <label for="favourite_book">Quels est votre livre préférer ?</label>
        <input type="text" name="book_name" id="favourite_book" placeholder="Rentrez votre livre préférer">
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
      <label for="favourite_genres">Quelles sont vos catégories préférentielles ?</label>
      <input type="text" class="form-control" name="genres_name" id="favourite_genres">
      <select class="custom-select" id="inputGroup">
        <option selected>Sélections</option>
        <option value="1">Roman</option>
        <option value="2">Droit</option>
        <option value="3">Aventure</option>
        <option value="4">Romantique</option>
        <option value="5">Actualité</option>
      </select>
    </div>

    <!-- Boutton -->
        <button class="btn" type="sumit">Envoyer</button>
 </div>
  </body>
</html>
