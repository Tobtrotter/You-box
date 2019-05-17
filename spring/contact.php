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
            <h1 class="mb-0">You Box</h1>
            <h3 class="subheading mb-4 pb-1">Votre box culturelle personnalisée</h3>
            <p>
              <a href="#" class="btn btn-primary py-3 px-4">Créer un compte</a> 
              <a href="#" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se connecter</a>
            </p>
            <div class="mouse">
              <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-6">
              <h2 class="h3">Contact</h2>
              <div>
                <p><span>Adresse : </span>Sud Management 47310 Estillac</p>
              </div>
              <div>
                <p><span>Email : </span> <a href="mailto:contact@youbox.com">contact@youbox.com</a></p>
              </div>
              <div>
                <p><span>Facebook</span> <a href="#">facebook.com</a></p>
              </div>
            </div>
            <div class="col-6">
              <form action="#" class="bg-light p-5 contact-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nom">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Objet">
                </div>
                <div class="form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Envoyer mon message" class="btn btn-primary py-3 px-5">
                </div>
              </form>
            </div>

        </div>
      </div>
    </section>


<?php include '_partials/footer.php';?>
 </body>
</html>