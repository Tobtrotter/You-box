<?php

session_start();

require 'conf/config-sql.php';
  
if(empty($_SESSION['user'])){
  // Je redirige l'utilisateur vers la page d'accueil s'il n'est pas connecté
  header('Location: index.php'); 
  die; // On arrete tout pour être sur qu'il ne peut pas aller plus loin
}



// Permet de récuperer TOUTES les informations depuis la base de données
$sql = 'SELECT * FROM users WHERE id = :param_id';
$res = $bdd->prepare($sql);
$res->bindValue(':param_id', $_SESSION['user']['id'], PDO::PARAM_INT);
$res->execute();

$my_user = $res->fetch();
if(empty($my_user)){ 
  // En théorie, peu de chance d'arriver mais au cas ou...
  // On trouve pas d'utilisateur ayant un ID correspondant
  header('Location: index.php');
}


// Pour acceder aux infos de mon utilisateur dans cette page 

echo $my_user['email'];
echo $my_user['firstname'];


// Pour acceder aux infos de mon utilisateur stockée en session 
echo $_SESSION['user']['firstname']; 
echo $_SESSION['user']['email']; 


?>
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



   <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <ul class="ministry-list">
              <li class="active"><a href="#">Récapitulatif</a></li>
              <li><a href="#">Mes informations</a></li>
              <li><a href="#">Missions</a></li>
            </ul>
          </div>
          <div class="col-md-9">
            <h3 class="mb-4">Mon abonnement</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            <ul class="ministry-list my-5">
              <li><span class="ion-ios-arrow-forward mr-2"></span>Bible classes for all ages</li>
              <li><span class="ion-ios-arrow-forward mr-2"></span>The Big Oxmox advised her not to do so</li>
              <li><span class="ion-ios-arrow-forward mr-2"></span>Pointing has no control about</li>
              <li><span class="ion-ios-arrow-forward mr-2"></span>Separated they live in Bookmarksgrove right</li>
            </ul>
            <hr>
            <h3 class="mb-4 mt-5">The Lord's Army</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="ministry-list">
							<li class="active"><a href="#">Youth &amp; Family</a></li>
							<li><a href="#">Community Outreach</a></li>
							<li><a href="#">Missions</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<h3 class="mb-4">Mon abonnement</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
						<ul class="ministry-list my-5">
							<li><span class="ion-ios-arrow-forward mr-2"></span>Bible classes for all ages</li>
							<li><span class="ion-ios-arrow-forward mr-2"></span>The Big Oxmox advised her not to do so</li>
							<li><span class="ion-ios-arrow-forward mr-2"></span>Pointing has no control about</li>
							<li><span class="ion-ios-arrow-forward mr-2"></span>Separated they live in Bookmarksgrove right</li>
						</ul>
						<hr>
						<h3 class="mb-4 mt-5">The Lord's Army</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
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

            <p>
 You Box &copy;<script>document.write(new Date().getFullYear());</script> </p>
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