<?php
// J'inclus le fichier "config.php" se trouvant dans le dossier "conf"
require 'conf/config.php';

// Le formulaire est soumis
if(!empty($_POST)){

  $post = array_map('trim', array_map('strip_tags', $_POST));

  var_dump($post); die;
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>YOU BOX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>    
  </head>
  <body>
    
    <nav class="navbar navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container d-flex align-items-stretch">
          <div class="col-3 d-flex align-items-center">
            <a href="index.html"><img src="images/logo-you.png" class="navbar-brand-logo"></a>
          </div>
          <div class="col-9 d-flex align-items-center text-right">
            <ul class="ftco-social mt-2 mr-3">
              
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>

            <button class="navbar-toggler d-flex align-items-center" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="pt-1 mr-1">Menu</span> <span class="oi oi-menu"></span>
            </button>
          </div>


        <div class="collapse navbar-collapse" id="ftco-nav">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Nos Box</a></li>
            <li class="nav-item"><a href="my-account.html" class="nav-link">Mon Compte</a></li>
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    


    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <br>
      <div class="container">
        <!-- <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }"> -->
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-4" id="form">
              <form method="post">
                <p>Veuillez remplir ce formulaire pour vous connecter</p>
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
                  <a href="my-account.html" class="btn btn-primary mb-2">Je n'ai pas de compte ?</a>
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