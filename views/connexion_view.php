<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once 'views/includes/head.php'?>
  </head>
  <body>
    <?php include_once 'views/includes/nav.php'?>

  <div class="container p-4 d-flex justify-content-center m-b-4">
      <?php if (!$_SESSION) { ?>

        <div class="card col-6 m-b-5">
          <div class="card-body">
            <h5 class="card-title text-center">Connexion</h5>
            <p class="lead text-center"> <?= $helper ?></p>
            <form action="#" method="post">
              <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="username" class="form-control" name="username">
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button type="submit" class="btn btn-primary" name="connexion">Se connecter</button>
            </form>
          </div>
      </div>
    <?php } else {
    ?>
      <p class="lead">Vous êtes déjà connecté.</p>
      <?php
} ?>
    </div>

    <!-- mot de passe de steph admin1234 -->
    <!-- FORMULAIRE A SUPPRIMER : CRYPTER UN MOT DE PASSE -->
    
    <?php
    if (isset($_POST['test'])) {
        echo password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    }
     ?>


         <?php include_once 'views/includes/footer.php' ?>
  </body>
</html>
