<?php

session_start();

require 'conf/config-sql.php';


$errors = [];

if(!empty($_POST)){



  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
  }


  if(!filter_var($post['input_email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Votre adresse email est invalide';
  }
  if(strlen($post['input_password']) < 8){
    $errors[] = 'Votre mot de passe doit comporter au moins 8 caractères';
  }
  elseif($post['input_password'] != $post['input_password_conf']){
    $errors[] = 'Votre mot de passe et sa confirmation ne correspondent pas';
  }
  if(count($errors) === 0){

  $sql = 'SELECT * FROM password_request WHERE email = :param_email AND code = :param_code';
  
  $result = $bdd->prepare($sql);

  $result->bindValue(':param_email', $post['input_email']);
  $result->bindValue(':param_code', $post['input_code']);



  $sql ="UPDATE users SET password = :param_password WHERE id = :param_id";
  $result = $bdd->prepare($sql);

  $result->bindValue(':param_id',$_SESSION['user']['id'],PDO::PARAM_INT);
  $result->bindValue(':param_password', password_hash($post['input_password'],PDO::PARAM_STR));

  if($result->execute()){

        // On sauvegarde
        if($result->execute()){

          $_SESSION['user'] = [
            'id'        => $_SESSION['id'], // Permet de connaitre l'id de l'utilisateur qu'on vient tout juste d'insérer
            'password'  => $post['input_password'],

          ];
          header('Location: my-account.php');
        }  
  }



  $sql = 'SELECT * FROM users WHERE id = :param_id';
$res = $bdd->prepare($sql);
$res->bindValue(':param_id', $_SESSION['user']['id'], PDO::PARAM_INT);
$res->execute();

header('Location: my-account.php');

$my_user = $res->fetch();
if(empty($my_user)){ 
  // En théorie, peu de chance d'arriver mais au cas ou...
  // On trouve pas d'utilisateur ayant un ID correspondant
  header('Location: index.php');
} 
}

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
              <form method="post">
                <p>Réinitialiser votre mot de passe</p>
                
                <?php
                  if(isset($errors) && count($errors) > 0){

                    echo '<div class="row no-gutters">
                            <div class="col-2 d-flex justify-content-center align-items-center">
                              <i class="icon-times" style="color:#f00;font-size:40px;"></i>
                            </div>';
                    echo  '<div class="col-10"> 
                              <p class="mb-0" style="font-size:12px;color:#f00">'.implode('<br>', $errors).'</p>
                          </div>';
                    echo '</div>';
                  }
                ?>

                <div class="form-group">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="email" name="input_email" class="form-control" id="formGroupExampleInput" placeholder="Email" value="<?php echo $post['input_email'] ?? '';?>">
                  </div>
                  <label for="formGroupExampleInput">Code reçu par email</label>
                  <input type="text" name="input_code" class="form-control" id="formGroupExampleInput" placeholder="Code reçu par email" value="<?php echo $post['input_code'] ?? '';?>">
                </div>                <div class="form-group">
                  <label for="exampleInputPassword">Mot de passe</label>
                  <input type="password" name="input_password" class="form-control" id="exampleInputPassword" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label for="exampleInputPasswordConf">Confirmation de mot de passe</label>
                  <input type="password" name="input_password_conf" class="form-control" id="exampleInputPasswordConf" placeholder="Confirmation de mot de passe">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Réinitialiser mon mot de passe</button>
                </div>
                <div class="form-group">
                  <a href="index.php" class="btn btn-primary mb-2">Annuler</a>
                </div>
              </form>
            </div>
          </div>            

          </div>
        </div> 

<?php include '_partials/footer.php';?> 
  </body>
</html>