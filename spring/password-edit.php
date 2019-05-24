<?php

session_start();

require 'conf/config-sql.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';





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
                <p>Vous pouvez modifier vos informations</p>

                <div class="form-group">
                  <label for="formGroupExampleInput">Email</label>
                  <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email">
                </div>                <div class="form-group">
                  <label for="exampleInputPassword">Mot de passe</label>
                  <input type="password" name="input_password" class="form-control" id="exampleInputPassword" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Modifier mes informations</button>
                </div>
                <div class="form-group">
                  <a href="my-account.php" class="btn btn-primary mb-2">Annuler</a>
                </div>
              </form>
            </div>
          </div>            

          </div>
        </div> 

<?php include '_partials/footer.php';?> 
  </body>
</html>