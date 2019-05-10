<!DOCTYPE html>
<html lang="fr">
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