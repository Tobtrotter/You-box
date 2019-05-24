<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



$errors = array();
  
if(!empty($_POST)){   // une condition pour m'assurer que le formulaire a bien été envoyé via la méthode POST


// sécurité : retirer toutes las balises HTMl et PHP (strip_tags) et retirer les espaces en début et fin de chaines saisies par l'internaute (trim)
// Le foreach() est une boucle qui va parcourir chaque élément d'un tableau, ici $_POST
// A L'aide de cette boucle je parcours l'ensemble des champs et les nettoies ( a l'aide de trim et strip_tags). Je recrée une variable $post qui comportera les mêmes données mais nettoyées de leurs caractères superflus (et surtout sécurisées)
//J'effectuerais donc mes vérifications

  foreach($_POST as $key => $value ){
    $post[$key] = trim (strip_tags($value));
  }


  // Si le champ "imput_fullname" est vide
  if(empty($post['input_name'])){
    // Alors j'ajoute une erreurs dans la variable $errors
    $errors[]='votre adresse mail doit être complétée';
  }
  //ou sinon on verifie la syntax de l'adresese email
  elseif (!filter_var($post['input_email'], FILTER_VALIDATE_EMAIL)) {
    $errors[]= 'votre adresse email est invalide';
  }
  // L'objet est vide alors erreur
  if (empty($post['input_objet'])) {
    $errors[]= ' L\'objet de votre message doit être complété';
  }
  // Encore une fois pour le message
  if (empty($post['input_message'])) {
    $errors[]= ' Le message doit être complété';
  }

  // if (count($errors) ===0) va compter le nombre de ligne dans le tableau errors
  // Les erreurs ne se rajoutent sque si les conditions de vérifications sont ko
  // Si je n'ai pas d'erreurs (égal à 0), ben j'envoie mon mail
  if (count($errors) ===0) {
    $formValid = true;
  }


if(!empty($_POST['input_name']) && !empty($_POST['input_email']) && !empty($_POST['input_objet']) && !empty($_POST['input_message'])){

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->CharSet = 'UTF-8'; // ACCENT
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = ' smtp.mailtrap.io';    // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = '214e9267608eb2';                 // SMTP username
      $mail->Password = '9135faed6e159a';                  // SMTP password
      $mail->SMTPSecure = 'tls';          // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom($post['input_email'], $post['input_name']);      // l'Expéditeur
      $mail->addAddress('mathilde.tobelem@gmail.com', 'Mathilde User');     // Le destinataire
      
      
      $mail->addCC('cc@example.com');             // Copie
      $mail->addBCC('bcc@example.com');           // Capie Caché

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Message du site : '.$post['input_objet'];

      //$mail->Body    = '<p>'.($_POST['input_name']).' vous envoie un message. Le message est '.($_POST['input_message']).' </p>';
      //$mail->AltBody = $_POST['input_message'];

      $message  = '<p>Bonjour,';
      $message.= '<br>Vous avez eu un nouveau message via votre formulaire :</p>';
      $message.= '<hr>';
      $message.= nl2br($post['input_message']);
      $message.= '<hr>';
      $message.= '<p><em>Vous pouvez répondre directement à cet email</em></p>';

      $mail ->msgHTML($message);
      $mail ->send();

      
  } catch (Exception $e) {
      echo 'Le message n\'a pas pu être envoyé :( Veuillez réessayer à nouveau ! ', $mail->ErrorInfo;
  }
}


  else{
    $formValid = false;
  }


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
            <h1 class="mb-0">You Box</h1>
            <h3 class="subheading mb-4 pb-1">Votre box culturelle personnalisée</h3>
            <p>
              <a href="user-add.php" class="btn btn-primary py-3 px-4">Créer un compte</a> 
              <a href="connexion.php" class="btn btn-white py-3 px-4"><span class="icon-play-circle"></span> Se connecter</a>
            </p>
            <div class="mouse">
              <a href="connexion.php" class="mouse-icon">
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
                <p><span>Facebook : </span> <a href="#">facebook/you-box.com</a></p>
              </div>
            </div>
            <div class="col-6">
              <?php
            // si la varible $formValid existe ET que sa valeur est à TRUE 
            if (isset($formValid) && $formValid == true ):?>
                <p style = "color:green"> Votre message a bien été envoyé, nous vous répondrons bientôt.</p>
            <?php elseif (isset($formValid) && $formValid == false): ?> 
                <p style ="color:red"><?php echo implode('<br>', $errors);?></p>
            <?php endif;?>
              <form method="post" class="bg-light p-5 contact-form">
          <p>Veuillez remplir ce formulaire pour envoyer votre message </p>
          <div class="form-group">
            <label for="formGroupExampleInput">Nom Complet</label>
            <input type="text" name="input_name" class="form-control" id="formGroupExampleInput" placeholder="Nom & Prénom">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Votre Email">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Objet</label>
            <input type="text" name="input_objet" class="form-control" id="formGroupExampleInput2" placeholder="Votre Objet">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Votre Message</label>
            <textarea name="input_message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
           </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary mb-2">Envoyer mon message</button>
          </div>
        </form>
            </div>

        </div>
      </div>
    </section>


<?php include '_partials/footer.php';?>
 </body>
</html>