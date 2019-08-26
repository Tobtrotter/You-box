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
                  <select class="custom-select custom-select-lg mb-3">
                  <option selected>Mois</option>
                  <option value="1">Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="1">Avril</option>
                  <option value="2">Mai</option>
                  <option value="3">Juin</option>
                  <option value="1">Juillet</option>
                  <option value="2">Août</option>
                  <option value="3">Septembre</option>
                  <option value="1">Octobre</option>
                  <option value="2">Novembre</option>
                  <option value="3">Décembre</option>
                </select>
                  <select class="custom-select custom-select-lg mb-3">
                  <option selected>Année</option>
                  <option value="1">2019</option>
                  <option value="2">2020</option>
                  <option value="3">2021</option>
                  <option value="1">2022</option>
                  <option value="2">2023</option>
                  <option value="3">2024</option>
                  <option value="1">2025</option>
                  <option value="2">2026</option>
                  <option value="3">2027</option>
                  <option value="1">2028</option>
                  <option value="2">2029</option>
                  <option value="3">2030</option>
                </select>
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