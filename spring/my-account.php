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
  if(!filter_validate($post['input_email'], FILTER_VALIDATE_EMAIL)){
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
   <?php include '_partials/menu.php';?>

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <br>
      <div class="container">
        <!-- <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }"> -->
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-4" id="form">
              <form method="post">
                <p>Veuillez remplir ce formulaire pour vous créer un compte</p>

                <?php
                  if(isset($errors) && count($errors) > 0){

                    echo '<p class="text-danger">'.implode('<br>', $errors);
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
                  <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Mot de passe</label>
                  <input type="password" name="input_password" class="form-control" id="exampleInputPassword" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label for="exampleInputPasswordConf">Confirmation de mot de passe</label>
                  <input type="password" name="input_password_conf" class="form-control" id="exampleInputPasswordConf" placeholder="Confirmation de mot de passe">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Créer mon compte</button>
                </div>
                <div class="form-group">
                  <a href="connexion.html" class="btn btn-primary mb-2">J'ai déjà un compte ?</a>
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



    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row md-12">
          <div class="col-md-6">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Spring Church</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>

            </div>

          </div>

            <div class="col-md-6">
              <div class="row no-gutters">
                <div class="col-md-6 ftco-animate">
                  <a href="images/image_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_1.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="icon-instagram"></span>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 ftco-animate">
                  <a href="images/image_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_2.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="icon-instagram"></span>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 ftco-animate">
                  <a href="images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_3.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="icon-instagram"></span>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 ftco-animate">
                  <a href="images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_4.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="icon-instagram"></span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            </div>
      </div>


          <br>

        <div class="row">
          <div class="col-md-12 text-center">

            <p> You Box &copy;<script>document.write(new Date().getFullYear());</script> </p>
          </div>
        </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>