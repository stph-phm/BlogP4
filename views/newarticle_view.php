<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once 'views/includes/head.php'?>
  </head>
  <body>
    <?php include_once 'views/includes/nav.php'?>

    <div class="container">
      <?php if ($_SESSION) { ?>
        <div class="jumbotron jumbotron-fluid bg-light">
          <form action="#" method="post">
            <div class="form-group">
              <label for="title">Titre de l'article</label>
              <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
              <label for="content">Contenu de l'article</label>
              <textarea id="mytextarea" class="form-control" name="content" rows="18"></textarea>
            </div>
            <button class="btn btn-primary " type="submit" name="publish">Publier</button>
          </form>
        </div>
      <?php } else {
    echo 'accès refusé';
} ?>
    </div>

    <?php include_once 'views/includes/footer.php' ?>
  </body>
</html>
