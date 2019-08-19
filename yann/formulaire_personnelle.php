<?php
// Session qui reste ouverte
session_start();


$errors = array();

if(!empty($_POST)){
  $post = array_map('trim', array_map('strip_tags', $_POST)); // Securise les données

  if(empty($post['tranche_age'])){
    $errors[] = 'Vous devez sélectionner une tranche d\'age';
  }
  if(empty($post['time_read'])){
    $errors[] = 'Vous devez rentrer un chiffri allant de 0 à 99';
  }
  if(empty($post['nb_books'])){
    $errors[] = 'Vous devez sélectionner une tranche de livre';
  }
  if(empty($post['time_week'])){
    $errors[] = 'Vous devez sélectionner une tranche de un chiffre qui re présentent vos séances de lecture';
  }

  if(count($errors) == 0){
    // Enregistrement en base de données avec INSERT
    $res = $bdd->prepare('INSERT INTO step1(tranche_age, time_read, nb_books, time_week) VALUES (:tranche_age, :time_read, :nb_books, :time_weeks)');

    $res->bindValue(':tranche_age', $post['tranche_age'], PDO::PARAM_STR);
    $res->bindValue(':time_read', $post['time_read']);
    $res->bindValue(':nb_books', $post['nb_books']);
    $res->bindValue(':time_week', $post['time_week']);

    // J'execute (donc ça sauvegarde)
    $res->execute();

    // Redirection
    header('Location: step2.php');
	}
	else {
		// Si la vaiable $form_valid vaut "false" alors le tableau $errors contient des erreurs
		$form_valid = false;
	}

  }

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- BootStrap --->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <title>Formulaire</title>
  </head>
  <body>

    <h1>Étape 1 : Formulaire Personnel</h1>

    <!-- Question 1 -->
      <form action="" method="post">
        <div class="form-group">
          <label for="choose" > De quel tranches d'âge êtes vous ? </label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tranche_age" id="tranche_age1" value="10-20">
            <label class="form-check-label" for="tranche_age1">10-20</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tranche_age" id="tranche_age2" value="20-30">
            <label class="form-check-label" for="tranche_age2">20-30</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tranche_age" id="tranche_age3" value="30-40">
            <label class="form-check-label" for="tranche_age3">30-40</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tranche_age" id="tranche_age4" value="40-50">
            <label class="form-check-label" for="tranche_age4">40-50</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tranche_age" id="tranche_age5" value="50-60">
            <label class="form-check-label" for="tranche_age5">50-60</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tranche_age" id="tranche_age6" value="60+">
            <label class="form-check-label" for="tranche_age6">60+</label>
          </div>
          <br>



    <!-- Question 2 -->
        <div class="form-group">
          <label for="time_read"> Depuis combien de temps lisez vous ?</label>
          <input type="text" class="form-control" name="time_read" id="read">
        </div>



    <!-- Question 3 -->
      <div class="form-group">
        <label for="choose" > Combien de livres avez-vous déjà lu ? </label>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nb_books" id="nb_books1" value="10-20">
          <label class="form-check-label" for="nb_books1">10-20</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nb_books" id="nb_books2" value="20-30">
          <label class="form-check-label" for="nb_books2">20-30</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nb_books" id="nb_books3" value="30-40">
          <label class="form-check-label" for="nb_books3">30-40</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nb_books" id="nb_books4" value="40-50">
          <label class="form-check-label" for="nb_books4">40-50</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nb_books" id="nb_books5" value="50+">
          <label class="form-check-label" for="nb_books5">50+</label>
        </div>
        <br>



    <!-- Question 4 -->
    <div class="form-group">
      <label for="choose" > Combien de temps lisez vous par semaine? </label>
      <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week1" value="1">
        <label class="form-check-label" for="time_week1">1</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week2" value="2">
        <label class="form-check-label" for="time_week2">2</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week3" value="3">
        <label class="form-check-label" for="time_week3">3</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week4" value="4">
        <label class="form-check-label" for="time_week4">4</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week5" value="5">
        <label class="form-check-label" for="time_week5">5</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week6" value="6">
        <label class="form-check-label" for="time_week6">6</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="time_week" id="time_week7" value="7+">
        <label class="form-check-label" for="time_week7">7+</label>
      </div>
      <br>



    <!-- Boutton -->

        <button >Envoyer</button>
  </body>
</html>
