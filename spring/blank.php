<!DOCTYPE html>
<html lang="fr">
<?php include '_partials/head.php';?>
<body>
   <?php include '_partials/menu.php';?>
    
  <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <?php if(!empty($_SESSION['user'])): ?> <!-- utilisateur connecté -->
              <h1 class="mb-0">You Box</h1>
              <h3 class="subheading mb-4 pb-3">Votre box culturelle personnalisée</h3>

              <h4 class="subheading small">Bienvenue <?php echo $_SESSION['user']['firstname'];?></h4> 

              <p>
                <a href="ministry.php" class="btn btn-primary py-3 px-4">Mon compte</a> 
                <a href="#" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se déconnecter</a>
              </p>
              <?php else: ?> <!-- utilisateur non connecté -->

              <h1 class="mb-0">You Box</h1>
              <h3 class="subheading mb-4 pb-1">Votre box culturelle personnalisée</h3>
              <p>
                <a href="#" class="btn btn-primary py-3 px-4">Créer un compte</a> 
                <a href="#" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se connecter</a>
              </p>
            <?php endif;?>


            <div class="mouse">
              <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php include '_partials/footer.php';?>    
</body>
</html>