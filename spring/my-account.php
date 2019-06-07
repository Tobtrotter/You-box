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

 
?>
<!DOCTYPE html>
<html lang="fr">
<?php include '_partials/head.php';?>
 <body>
   <?php include '_partials/menu-account.php';?>

   <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            
            <?php if(!empty($_SESSION['user'])): ?> <!-- utilisateur connecté -->
            <h1 class="mb-0">Bienvenue <?php echo $_SESSION['user']['firstname'];?>,</h1>
            <h3 class="subheading mb-4 pb-3">Votre box culturelle personnalisée selon vos goûts</h3>
            <p>
              <a href="my-espace.php" class="btn btn-primary py-3 px-4">Mon compte</a> 
              <a href="signout.php" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se déconnecter</a>
            </p>
            <?php else: ?> <!-- utilisateur non connecté -->

            <h1 class="mb-0">You Box</h1>
            <h3 class="subheading mb-4 pb-1">Votre box culturelle personnalisée</h3>
            <p>
              <a href="user-add.php" class="btn btn-primary py-3 px-4">Créer un compte</a> 
              <a href="my-account.php" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se connecter</a>
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
              <li class="active"><a href="my-account.php">Ma box du mois</a></li>
              <li><a href="my-historique.php">Historique</a></li>
              <li><a href="my-infos.php">Mes informations</a></li>
            </ul>
          </div>
          <div class="col-md-9">
            <h3 class="mb-4">JANE EYRE de Charlotte Brontë</h3>

            <img src="images/jane.png" alt="janeeyre">
            
            <H4>Résumé :</H4>
            <p>Orpheline, Jane Eyre est recueillie à contrecœur par une tante qui la traite durement et dont les enfants rudoient leur cousine. Placée ensuite en pension, elle y reste jusqu'à l'âge de dix-huit ans. Elle devient alors gouvernante pour le noble M. Rochester, dont elle tombe bientôt amoureuse, mais les obstacles seront nombreux.
            <br>
            <br>
            Jane Eyre, c'est Charlotte Brontë elle-même, dont l'oeuvre, unique dans la production féminine de son époque, bouleverse encore, après plus d'un siècle, les lecteurs du monde entier. Ce roman autobiographique est aussi son chef-d'oeuvre. Avec une vérité, une intensité d'expression jamais égalée peut-être, elle y retrace la vie d'une pauvre gouvernante aimée du père de son élève, le rude Rochester, dont l'existence s'entoure de tragique et de mystère. Fuyant héroïquement devant une passion qu'elle juge coupable, Jane Eyre, après de longs mois de souffrance, retrouvera enfin Rochester, aveugle, mutilé, abandonné de tous, et pourra unir sa vie à la sienne. </p>

            <ul class="ministry-list my-5">
              <li class="active"><a href="#"><span class="ion-ios-arrow-forward mr-2"></span>Époque : Ère Victorienne</li>
              <li class="active"><a href="#"><span class="ion-ios-arrow-forward mr-2"></span>Contexte politique et sociale</li>
              <li class="active"><a href="#"><span class="ion-ios-arrow-forward mr-2"></span>Analyse</li>
            </ul>
            <hr>
            <h4>Si vous avez aimé Jane Eyre, vous aimerez aussi : </h4>
           <ul class="ministry-list my-5">
              <!-- Faire des liens vers les pages des livres -->
              <li><span></span>"Orgueil et Préjugés" de Jane Austen</li>
              <li><span></span>"L'éducation sentimentale" de Gustave Flaubert</li>
              <li><span></span>"Les Hauts des Hurlevents" de Emily Brontë</li>
              <li><span></span>"Gatsby le Magnifique" de F. Scott Fitzgerald</li>
            </ul>


          </div>
        </div>
      </div>
    </section>

    
<?php include '_partials/footer.php';?> 
  </body>
</html>