<?php
session_start(); // On démarre la session pour mémoriser l'utilsateur connecté
// J'inclus le fichier "config.php" se trouvant dans le dossier "conf"
require 'conf/config-sql.php';

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
                <p>Vous avez choisi la formule Classique :)</p>
                <p>Montant de votre commande : 10€</p>
                <div class="form-group">
                  <label for="formGroupExampleInput">Nom affiché sur la carte</label>
                  <input type="text" name="input_lastname" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Numéro de carte</label>
                  <input type="text" name="input_number" class="form-control" id="formGroupExampleInput">
                </div>
                
                <div class="form-group">
                  <label for="formGroupExampleInput">Date d'expiration (MM/AA)</label>
                  <input type="date" name="input_date" class="form-control" id="formGroupExampleInput"min="08/19" max="12/39">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Cryptogramme (CVC)</label>
                  <input type="text" name="input_crypto" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Payer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



<?php include '_partials/footer.php';?>

</body>
</html>