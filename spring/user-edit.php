<?php

session_start();

require 'conf/config-sql.php';
  
if(empty($_SESSION['user'])){
  // Je redirige l'utilisateur vers la page d'accueil s'il n'est pas connecté
  header('Location: index.php'); 
  die; // On arrete tout pour être sur qu'il ne peut pas aller plus loin
}


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


    $sql = "UPDATE users SET lastname = :param_lastname,firstname = :param_firstname, email = :param_email WHERE id = :param_id";

    $result = $bdd->prepare($sql);

    $result->bindValue(':param_id', $_SESSION['user']['id'],PDO::PARAM_INT);
    $result->bindValue(':param_lastname', $post['input_lastname'],PDO::PARAM_STR);
    $result->bindValue(':param_firstname', $post['input_firstname'],PDO::PARAM_STR);
    $result->bindValue(':param_email', $post['input_email'],PDO::PARAM_STR);

    // On sauvegarde
    if($result->execute()){

      $_SESSION['user'] = [
        'id'        => $_SESSION['user']['id'], // Permet de connaitre l'id de l'utilisateur qu'on vient tout juste d'insérer
        'firstname' => $post['input_firstname'],
        'lastname'  => $post['input_lastname'],
        'email' => $post['input_email'],
      ];
    }
  }


// Permet de récuperer TOUTES les informations depuis la base de données
$sql = 'SELECT * FROM users WHERE id = :param_id';
$res = $bdd->prepare($sql);
$res->bindValue(':param_id', $_SESSION['user']['id'], PDO::PARAM_INT);
$res->execute();

$my_user = $res->fetch();
if(empty($my_user)){ 
  // En théorie, peu de chance d'arriver mais au cas ou...
  // On trouve pas d'utilisateur ayant un ID correspondant
  header('Location: index.php');
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



            <?php if(!empty($_SESSION['user'])): ?> <!-- utilisateur connecté -->
            <div class="col-md-6 col-xl-5" id="form">
              <form method="post">
                <p>Vous pouvez modifier vos informations</p>

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
                  <input type="text" name="input_lastname" class="form-control" id="formGroupExampleInput" placeholder="Nom" value="<?php echo $my_user['lastname']; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Prénom</label>
                  <input type="text" name="input_firstname" class="form-control" id="formGroupExampleInput" placeholder="Prénom" value="<?php echo $my_user['firstname']; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Email</label>
                  <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email" value="<?php echo $my_user['email']; ?>">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Modifier mes informations</button>
                </div>
                <div class="form-group">
                  <a href="my-espage.php" class="btn btn-primary mb-2">Annuler</a>
                </div>
              </form>
            </div>
          </div>            






            <?php else: ?> <!-- utilisateur non connecté -->

            <h1 class="mb-0">You Box</h1>
            <h3 class="subheading mb-4 pb-1">Votre box culturelle personnalisée</h3>
            <p>
              <a href="user-add.php" class="btn btn-primary py-3 px-4">Créer un compte</a> 
              <a href="my-account.php" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se connecter</a>
            </p>
          <?php endif;?>











          </div>
        </div>
      </div>    

<?php include '_partials/footer.php';?> 
  </body>
</html>