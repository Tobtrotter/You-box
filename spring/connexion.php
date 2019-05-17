<?php
session_start(); // On démarre la session pour mémoriser l'utilsateur connecté
// J'inclus le fichier "config.php" se trouvant dans le dossier "conf"
require 'conf/config-sql.php';

// Le formulaire est soumis
if(!empty($_POST)){

  $errors = [];
  $errors_user = [];
  // Permet de nettoyer les données saisies dans le formulaire. C'est à dire, retirer les espaces inutiles au début & à la fin
  // et retirer l'éventuel code HTML ou PHP qui pourrait représenter d'éventuelles failles de sécurité
  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value)); 
  }


  if(empty($post['input_email'])){
    $errors[] = 'Votre adresse email doit être complétée';
  }
  if(!filter_var($post['input_email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Votre adresse email est invalide';
  }
  if(empty($post['input_password'])){
    $errors[] = 'Votre mot de passe doit être complété';
  }

  if(count($errors) === 0){

    $sql = 'SELECT * FROM users WHERE email = :param_email LIMIT 1';
    $res = $bdd->prepare($sql);

    $res->bindValue(':param_email', $post['input_email']);
    $res->execute();

    $user = $res->fetch(); // Permet de récupérer les informations de l'utilisateur existant dans SQL (phpmyadmin)

    if(empty($user)){
      $errors_user[] = 'Aucun compte existant n\'est associé a cette adresse email';
    }
    else {
      // Ici, on a utilisateur qui correspond a l'adresse email saisie

      // Vérification du mot de passe
      if(!password_verify($post['input_password'], $user['password'])){
        $errors_user[] = 'Votre mot de passe est invalide';
      }
      else {

        $_SESSION['user'] = [
          'id'        => $user['id'],
          'firstname' => $user['firstname'],
          'lastname'  => $user['lastname'],

        ];

          $token = hash('sha256',$bdd->lastInsertId() . time());
          setcookie("authToken", $token, time()+60*60*24*365); 
          // le coookie expire dans 365 jours        


        header('Location: my-account.php'); // Redirige vers la page my-account
      }

    }
  }
}

// J'ai un cookie
if(!empty($_COOKIE['authToken'])){
  header('Location: my-account.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<?php include '_partials/head.php';?>
<body>
   <?php include '_partials/menu.php';?>
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <br>
      <div class="container">
        <!-- <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }"> -->
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-6 col-xl-5" id="form">
              <form method="post">
                <p>Veuillez remplir ce formulaire pour vous connecter</p>
                



                <?php
                  if(isset($errors_user) && count($errors_user) > 0){

                    echo '<div class="row no-gutters">
                            <div class="col-2 d-flex justify-content-center align-items-center">
                              <i class="icon-times" style="color:#f00;font-size:40px;"></i>
                            </div>';
                    echo  '<div class="col-10"> 
                              <p class="mb-0" style="font-size:12px;color:#f00">'.implode('<br>', $errors_user).'</p>
                          </div>';
                    echo '</div>';
                  }
                ?>


                
                <div class="form-group">
                  <label for="formGroupExampleInput">Email</label>
                  <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mot de passe</label>
                  <input type="password" name="input_password" class="form-control" id="exampleInputPassword" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Me connecter</button>
                </div>
                <div class="form-group">
                  <a href="user-add.php" class="btn btn-primary mb-2">Je n'ai pas de compte ?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



<?php include '_partials/footer.php';?>

</body>
</html>