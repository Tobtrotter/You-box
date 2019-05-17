    <nav class="navbar navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container d-flex align-items-stretch">
          <div class="col-3 d-flex align-items-center">
            <a href="index.php"><img src="images/logo-you.png" class="navbar-brand-logo"></a>
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
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">Nos Box</a></li>
            <li class="nav-item"><a href="connexion.php" class="nav-link">Mon Compte</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <?php

session_start();

require 'conf/config-sql.php';
  
if(empty($_SESSION['user'])){
  // Je redirige l'utilisateur vers la page d'accueil s'il n'est pas connecté
  header('Location: index.php'); 
  die; // On arrete tout pour être sur qu'il ne peut pas aller plus loin
}
 ?>
