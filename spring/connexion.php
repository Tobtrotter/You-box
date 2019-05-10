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
    $post[$key] = trim(strip_tags($_POST)); 
  }


  if(!empty($post['input_email'])){
    $errors[] = 'Votre adresse email doit être complétée';
  }
  if(!filter_var($post['input_email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Votre adresse email est invalide';
  }
  if(!empty($post['input_password'])){
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
        header('Location: my-account.php'); // Redirige vers la page my-account
      }

    }



  }

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
            <div class="col-4" id="form">
              <form method="post">
                <p>Veuillez remplir ce formulaire pour vous connecter</p>
                
                <?php
                  if(isset($errors) && count($errors) > 0){

                    echo '<p class="text-danger">'.implode('<br>', $errors);
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
                  <a href="my-account.php" class="btn btn-primary mb-2">Je n'ai pas de compte ?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>





<section class="ftco-section ftco-section-parallax bg-secondary ftco-no-pb">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white heading-section-no-line ftco-animate">
              <h2>Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include '_partials/footer.php';?>

</body>
</html>