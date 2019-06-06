<?php

session_start();

require 'conf/config-sql.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';





if(!empty($_POST)){

   $errors = [];


  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
  }
  if(!filter_var($post['input_email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Votre adresse email est invalide';
  }

  // On compte les erreurs et s'il n'y en a pas, le formulaire est valide
  if(count($errors) === 0){
    $formValid = true;


    // On sauvegarde notre code + email + expiration dans la base de données.
    $code = uniqid();
    $date_expire = date('Y-m-d H:i:s', strtotime('+48 hours'));


    // on envoi le mail
      $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = 0;                 // Active ou non le débug
            $mail->CharSet = 'UTF-8';        // ACCENTS
            $mail->isSMTP();                    // Utilisation du SMTP

            // Information à personnaliser avec vos identifiants mailtrap
            $mail->Host = ' smtp.mailtrap.io'; 
            $mail->SMTPAuth = true;               
            $mail->Username = '9da071f9358791';                 
            $mail->Password = '4999a878bd7b22';               
            $mail->SMTPSecure = 'tls';      
            $mail->Port = 465;             

            //Recipients
            $mail->setFrom('contact@youbox.com', 'YouBox'); // L'expéditeur
            $mail->addAddress($post['input_email']); // Le destinataire            

            //Content
            $mail->isHTML(true);  
            $mail->Subject = 'Changement de mot de passe';
    

           $message = '<p>Bonjour,';
           $message.= '<br>Vous avez fait une demande de changement de mot de passe.';
           $message.= '<br>Voici ci-dessous le code pour permettre ce changement.';
           $message.= '<hr>';
           $message.= $code;
           $message.= '<hr>';
           $message.= '<p><em>Vous pouvez répondre directement à cette email</em></p>';

            $mail->msgHTML($message);

            $mail->send();
            $result = $bdd->prepare('INSERT INTO password_request  (email,uniqid,date_expire) VALUES(:param_email,:param_uniqid, :param_date_expire)');

              $result->bindValue(':param_email', $post['input_email']);
              $result->bindValue(':param_uniqid', $code);
              $result->bindValue(':param_date_expire', $date_expire);


              $result->execute();    

              header('Location: password-edit.php');        
        }
        else { // Sinon j'ai des erreurs
          $formValid = false;
        }
      }




// J'ai un cookie
if(!empty($_COOKIE['authToken'])){
  header('Location: my-account.php');
}




?>
<!DOCTYPE html>
<html lang="fr">
<?php include '_partials/head.php';?>
<body>
   <?php include '_partials/menu-account.php';?>

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <br>
      <div class="container">
        <!-- <div class="ftco-animate" data-scrollax=" properties: { translateY: '70%' }"> -->
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">

            <div class="col-md-6 col-xl-5" id="form">
               <?php
              // si la varible $formValid existe ET que sa valeur est à TRUE 
              if (isset($formValid) && $formValid == true ):?>
                  <p style = "color:green"> Le mail de réinitialisation a bien été envoyé sur l'adresse mail renseignée.</p>
              <?php elseif (isset($formValid) && $formValid == false): ?> 
                  <p style ="color:red"><?php echo implode('<br>', $errors);?></p>
              <?php endif;?>
              <form method="post">
                <p>Vous pouvez modifier vos informations</p>

                <div class="form-group">
                  <label for="formGroupExampleInput">Email</label>
                  <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Réinitialiser mon mot de passe</button>
                </div>
                <div class="form-group">
                  <a href="my-account.php" class="btn btn-primary mb-2">Annuler</a>
                </div>
              </form>
            </div>
          </div>            

          </div>
        </div> 

<?php include '_partials/footer.php';?> 
  </body>
</html>