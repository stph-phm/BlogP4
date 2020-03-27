<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once 'views/includes/head.php'?>
  </head>
  <body>
    <?php include_once 'views/includes/nav.php'?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"><?= $lastArticle['title'] ?></h1>
        <p class="lead"><?= substr($lastArticle['content'], 0, 100) ?> ...</p>
        <a href="article?id=<?= $lastArticle['id'] ?>">Lire la suite</a>
      </div>
    </div>

    <div class="container">
    <div class="d-flex justify-content-around align-items-conter">
      <?php foreach ($firstArticles as $index => $article): ?>
      <div class="card col-5">
        <div class="card-body">
          <h5 class="card-title"><?= $article['title'] ?></h5>
          <p class="card-text"><?= substr($article['content'], 0, 100) ?> ...</p>
          <a href="article?id=<?= $article['id'] ?>" class="btn btn-link p-0">Lire la suite</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
      <?php include_once 'views/includes/footer.php' ?>
  </body>
</html>
