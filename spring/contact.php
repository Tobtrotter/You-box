<!DOCTYPE html>
<html lang="fr">
<?php include '_partials/head.php';?>
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
              <h2 class="h3">Contact Information</h2>
              <div>
                <p><span>Adresse:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
              </div>
              <div>
                <p><span>Téléphone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
              </div>
              <div>
                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
              </div>
              <div>
                <p><span>Votre Site</span> <a href="#">yoursite.com</a></p>
              </div>
            </div>
            <div class="col-6">
              <form action="#" class="bg-light p-5 contact-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                </div>
              </form>
            </div>

        </div>
      </div>
    </section>

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