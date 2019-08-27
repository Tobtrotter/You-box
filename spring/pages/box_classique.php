<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=site_web;',
  'root',
  '',
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$pre=$pdo->prepare('select * from auteur');
$pre->execute();
$auteurs=$pre->fetchAll(PDO::FETCH_OBJ);
$pre=$pdo->prepare('select * from genre');
$pre->execute();
$genres=$pre->fetchAll(PDO::FETCH_OBJ);
$pre=$pdo->prepare('select * from livre');
$pre->execute();
$livres=$pre->fetchAll(PDO::FETCH_OBJ);
?>

<form method="get" action="box_classique.php">
  <label>Livre</label>
  <select name="livre">
    <option></option>
    <?php foreach ($livres as $livre): ?>
      <option value="<?php echo $livre->pk_livre ?>" <?php echo isset($_GET['livre']) && $_GET['livre']==$livre->pk_livre?'selected':'' ?>><?php echo $livre->nom ?></option>
    <?php endforeach; ?>
  </select><br>
  <label>Genre</label>
  <select name="genre">
    <option></option>
    <?php foreach ($genres as $genre): ?>
      <option value="<?php echo $genre->pk_genre ?>" <?php echo isset($_GET['genre']) && $_GET['genre']==$genre->pk_genre?'selected':'' ?>><?php echo $genre->nom ?></option>
    <?php endforeach; ?>
  </select><br>
  <label>Auteur</label>
  <select name="auteur">
    <option></option>
    <?php foreach ($auteurs as $auteur): ?>
      <option value="<?php echo $auteur->pk_auteur ?>" <?php echo isset($_GET['auteur']) && $_GET['auteur']==$auteur->pk_auteur?'selected':'' ?>><?php echo $auteur->nom ?></option>
    <?php endforeach; ?>
  </select><br>
  <input type="submit"><br>
</form>
  <?php
if(isset($_GET['genre'])){
  // prendre le livre préféré

  // foreach sur tous les mots clés => voir la fonction explode();

  // dans le foreach tu vas faire des like '%%' sur tous les autres livres (where pk_livre != 'livre préféré')
  // stock pk_livre dans un tableau $livres=array();

  // genre
  // requete sur tous les livres qui correspondent à ce genre (where pk_livre != 'livre préféré')
  // stock pk_livre dans une variable $livre_genre=array();

  // auteur
  // requete sur tous ses livres (where pk_livre != 'livre préféré')
  // stock p_livre dans une variable $livre_auteur=array();

  // compter le score de chaque pk_livre
  // faire une requetes du meilleur livre
  ?>
  <table border="1">
    <thead>
      <tr>
        <th>Auteur</th>
        <th>Titre</th>
      </tr>
      <?php if (!isset($livres)): ?>
        <tr>
          <td colspan="2">Aucun livre trouvé</td>
        </tr>
      <?php else: ?>
        <?php foreach ($livres as $livre): ?>
          <tr>
            <td><?php echo $livre->auteur_nom ?></td>
            <td><?php echo $livre->nom ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </thead>
    <tbody>
    </tbody>
  </table>
  <?php
}
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- BootStrap --->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Formulaire</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <div class="contact-form">
      <h1>Box Classique </h1>


      <!-- Question 1 -->
      <!-- Si on a pas l'auteur enregistrer envoyé un mail d'alerte pour créer la fiche de l'auteur-->
      <div class="form-group">
        <label for="favourite_autor">Quels est votre auteur favoris ?</label>
        <input type="text" name="author_name" id="favourite_autor" placeholder="Rentrez votre auteur favoris">
      </div>

    <!-- Question 2 -->
    <!-- Si on a pas le livre enregistrer envoyé un mail d'alerte pour créer la fiche du livre-->
      <div class="form-group">
        <label for="favourite_book">Quels est votre livre préférer ?</label>
        <input type="text" name="book_name" id="favourite_book" placeholder="Rentrez votre livre préférer">
      </div>


    <!-- Question 3 -->
    <div class="form-group">
      <label for="favourite_genres">Quelles sont vos catégories préférentielles ?</label>
      <input type="text" class="form-control" name="genres_name" id="favourite_genres">
      <select class="custom-select" id="inputGroup">
        <option selected>Sélections</option>
        <option value="1">Roman</option>
        <option value="2">Droit</option>
        <option value="3">Aventure</option>
        <option value="4">Romantique</option>
        <option value="5">Actualité</option>
      </select>
    </div>

    <!-- Boutton -->
        <button class="btn" type="sumit">Envoyer</button>
 </div>
  </body>
</html>
