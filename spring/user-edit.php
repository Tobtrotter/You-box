<?php

session_start(); // On utilise les sessions

// On se connecte a la base de données
require 'conf/config-sql.php';


if(!empty($_POST)){

   $errors = [];


  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
  }

  if(strlen($post['input_lastname']) < 2){
    $errors[] = 'Votre nom doit comporter au moins 2 caractères';
  }
  if(strlen($post['input_firstname']) < 2){
    $errors[] = 'Votre prénom doit comporter au moins 2 caractères';
  }
  if(!filter_var($post['input_email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Votre adresse email est invalide';
  }

  if(strlen($post['input_password']) < 8){
    $errors[] = 'Votre mot de passe doit comporter au moins 8 caractères';
  }
  elseif($post['input_password'] != $post['input_password_conf']){
    $errors[] = 'Votre mot de passe et sa confirmation ne correspondent pas';
  }

  // On compte les erreurs et s'il n'y en a pas, le formulaire est valide
  if(count($errors) === 0){

    // sauvegarder l'utilisateur en base de données

    // On préparer la sauvegarde
    $result = $bdd->prepare('INSERT INTO users (lastname,firstname,email,password) VALUES(:param_lastname,:param_firstname,:param_email,:param_password)');

    $result->bindValue(':param_lastname', $post['input_lastname']);
    $result->bindValue(':param_firstname', $post['input_firstname']);
    $result->bindValue(':param_email', $post['input_email']);
    $result->bindValue(':param_password', password_hash($post['input_password'], PASSWORD_DEFAULT));

    // On sauvegarde
    if($result->execute()){

      $_SESSION['user'] = [
        'id'        => $bdd->lastInsertId(), // Permet de connaitre l'id de l'utilisateur qu'on vient tout juste d'insérer
        'firstname' => $post['input_firstname'],
        'lastname'  => $post['input_lastname'],
      ];

      //header('Location: mapage_de_destination_des_questionnaires_deYann&Maureen.php');
    }
  }



}

?>
<!DOCTYPE html>
<html lang="fr">
<?php include '_partials/head.php';?>
<body>
   <?php include '_partials/menu-account.php';?>

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <br>
      <div class="container">
        <!-- <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }"> -->
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-6 col-xl-5" id="form">
              <form method="post">
                <p>Veuillez remplir ce formulaire pour vous créer un compte</p>

                <?php
                  if(isset($errors) && count($errors) > 0){

                    echo '<div class="row no-gutters">
                            <div class="col-2 d-flex justify-content-center align-items-center">
                              <i class="icon-times" style="color:#f00;font-size:40px;"></i>
                            </div>';
                    echo  '<div class="col-10"> 
                              <p class="mb-0" style="font-size:12px;color:#f00">'.implode('<br>', $errors).'</p>
                          </div>';
                    echo '</div>';
                  }
                ?>

                <div class="form-group">
                  <label for="formGroupExampleInput">Nom</label>
                  <input type="text" name="input_lastname" class="form-control" id="formGroupExampleInput" placeholder="Nom">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Prénom</label>
                  <input type="text" name="input_firstname" class="form-control" id="formGroupExampleInput" placeholder="Prénom">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Email</label>
                  <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email" value="<?php echo $my_user['email']; ?>">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Créer mon compte</button>
                </div>
                <div class="form-group">
                  <a href="connexion.php" class="btn btn-primary mb-2">J'ai déjà un compte ?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>    

<?php include '_partials/footer.php';?> 
  </body>
</html>