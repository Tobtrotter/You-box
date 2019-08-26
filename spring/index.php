<?php 
if(!empty($_SESSION['user']) || !empty($_COOKIE['authToken'])){
  header('Location: my-account.php');
}
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
              <a href="connexion.php" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se déconnecter</a>
            </p>
            <?php else: ?> <!-- utilisateur non connecté -->

            <h1 class="mb-0">You Box</h1>
            <h3 class="subheading mb-4 pb-1">Votre box culturelle personnalisée</h3>
            <p>
              <a href="user-add.php" class="btn btn-primary py-3 px-4">Créer un compte</a> 
              <a href="connexion.php" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se connecter</a>
            </p>
          <?php endif;?>


            <div class="mouse">
              <a class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

      <section class="ftco-daily-verse bg-light">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-10 daily-verse text-center p-5">
                  
                  <h3 class="ftco-animate"><img src="images/guillemet1.png">Les gens ne réalisent pas à quel point un simple livre peut changer toute une vie.<img src="images/guillemet2.png"></h3>
                  <h4 class="h5 mt-4 font-weight-bold ftco-animate">&mdash; Malcom X</h4>
                </div>
              </div>
            </div>
          </section>



    
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-12 text-center heading-section ftco-animate">
            <h2 class="mb-2"><span class="px-4">Nos avantages</span></h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-lg-6">
    				<div class="d-flex services ftco-animate text-lg-right">
	            <div class="icon order-lg-last d-flex align-items-center justify-content-center"><img src="images/logistics-delivery-truck-in-movement (2).png"></div>
	            <div class="media-body pr-lg-5">
	              <h3 class="heading mb-3">Pratique</h3>
	              <p>Livrée à domicile tous les mois par Colissimo ou Mondial Relay.</p>
                
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-right">
	            <div class="icon order-lg-last d-flex align-items-center justify-content-center"><img src="images/paint-palette (2).png"></div>
	            <div class="media-body pr-lg-5">
	              <h3 class="heading mb-3">Personnalisé</h3>
	              <p>Contenu personnalisé grâce à un questionnaire. Elle correspond à chacun et ne ressemble à personne d'autre. </p>
	            </div>
	          </div>
	          
    			</div>

    			<div class="col-lg-6">
    				<div class="d-flex services ftco-animate text-lg-left">
	            <div class="icon d-flex align-items-center justify-content-center"><img src="images/lock-and-key-icon-silhouette.png"></div>
	            <div class="media-body pl-lg-5">
	              <h3 class="heading mb-3">Espace Membre</h3>
	              <p> Espace personnel permettant de mieux appréhender et comprendre l'univers du livre</p>
	            </div>
	          </div>
	          <div class="d-flex services ftco-animate text-lg-left">
	            <div class="icon d-flex align-items-center justify-content-center"><img src="images/light-brain-education-symbol.png"></div>
	            <div class="media-body pl-lg-5">
	              <h3 class="heading mb-3">Sans prise de tête</h3>
	              <p>Pas besoin de penser de recommander à chaque fin de mois, ça se fait tout seul.</p>
	            </div>
	          </div>
	          
	          </div>
    			</div>
    		</div>
    	</div>
    </section>

    


     <section class="ftco-section testimony-section">
    	
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-2">Notre équipe</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">Passionnée de littérature et de droit, je souhaite être riche.</p>
                    <p class="name">Maureen Sauteur</p>
                    <span class="position">Chef de Produit</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Cécile Dillet</p>
                    <span class="position">Responsable Marketing</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mathilde Tobelem</p>
                    <span class="position">Graphiste et UX Design</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text p-3">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Yann Faubet</p>
                    <span class="position">Technicien</span>
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