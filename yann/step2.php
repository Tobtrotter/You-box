<?php
// Session qui reste ouverte
session_start();

$errors = array();

if(!(empty($_POST))){
  $post = array_map('trim', array_map('strip_tags', $_POST)); // Sécurise les données

  if (empty($post[choose_box1])) {
    header('Location: step3.php');
    $errors[]='Vous devez choisir une box';
  }

  if (empty($post[choose_box2])) {
    header('Location: step4.php');
    $errors[]='Vous devez choisir une box';
  }

  if (empty($post[choose_box3])) {
    header('Location: step5.php');
    $errors[]='Vous devez choisir une box';
  }

  if (empty($post[choose_box4])) {
    header('Location: step6.php');
    $errors[]='Vous devez choisir une box';
  }

  if(count($errors) == 0){
    // Enregistrement en base de données avec INSERT
    $res = $bdd->prepare('INSERT INTO step2(choose_box) VALUES (:choose_box1, :choose_box2, :choose_box3, :choose_box4)');

    $res->bindValue(':choose_box1', $post['choose_box1'], PDO::PARAM_STR);
    $res->bindValue(':choose_box2', $post['choose_box2']);
    $res->bindValue(':choose_box3', $post['choose_box3']);
    $res->bindValue(':choose_box4', $post['choose_box4']);

    // J'execute (donc ça sauvegarde)
    $res->execute();

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

    <title>Formulaire</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <h1>Étape 2 : Choix de la Box</h1>

    <!-- Box 1 -->
      <form action="" method="post">
        <div class="form-group">
          <label for="choose" > Quels formules aimerais vous choisir ? </label>
          <br>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choose_box" id="choose_box1" value="Classique">
          <label class="form-check-label" for="choose_box1">
            Box Clasique
          </label>
            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
              +
            </button>
          <div class="collapse" id="collapse1">
            <div class="card d-inline-block">
              <div class="card-body">
                1 livre attribué en fonction des réponses au questionnaire rempli
              </div>
            </div>
          </div>


    <!-- Box 2 -->
      <div class="form-check">
        <input class="form-check-input" type="radio" name="choose_box" id="choose_box2" value="Etudiant">
        <label class="form-check-label" for="choose_box2">
              Box Étudiante
        </label>
          <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            +
          </button>
        <div class="collapse" id="collapse2">
          <div class="card d-inline-block">
            <div class="card-body">
              1 livre en rapport avec les études (collége, lycée, études supérieures)
            </div>
          </div>
        </div>



    <!-- Box 3 -->
      <div class="form-check">
        <input class="form-check-input" type="radio" name="choose_box" id="choose_box3" value="Actualité">
        <label class="form-check-label" for="choose_box3">
            Box Actualité
        </label>
          <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
              +
          </button>
        <div class="collapse" id="collapse3">
          <div class="card d-inline-block">
            <div class="card-body">
             Livre, revus, magazines en lien avec l'actualité politique, sociale, culturelle, environnementales et technologique
            </div>
          </div>
        </div>



      <!-- Box 4 -->
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choose_box" id="choose_box4" value="Coup de coeur">
          <label class="form-check-label" for="choose_box4">
            Box Coup de Coeur
          </label>
            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
              +
            </button>
          <div class="collapse" id="collapse4">
            <div class="card d-inline-block">
              <div class="card-body">
              1 livre nouveau et qui a suscité l'unanimité dans notre équipe
              </div>
            </div>
          </div>


    <!-- Boutton -->

        <button >Envoyer</button>
  </body>
</html>
