<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once 'views/includes/head.php'?>
  </head>
  <body>
    <?php include_once 'views/includes/nav.php'?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container d-flex justify-content-center">
        <h1 class="display-1"><?= $article->title ?></h1>
      </div>
    </div>

    <div class="container">

      <div class="jumbotron jumbotron-fluid bg-light">
        <p class="lead"> <?= $article->content ?></p>
        <div class="w-100 text-right">
          <p><?= date_format(date_create($article->date_article), 'd/m/Y')?></p>
        </div>
      </div>

      <div class="container">
        <?php foreach ($comments as $index => $comment): ?>
        <div class="jumbotron">
          <p class="lead"><?= $comment['pseudo'] ?> à <?= date_format(date_create($comment['date_com']), 'd/m/Y H:i') ?></p>
          <hr class="my-4">
          <p><?= $comment['comment']?></p>
          <?php if ($comment['reported'] == 0) { ?>
          <form action="article?id=<?= $article->id ?>&amp;report=<?= $comment['id'] ?>" method="post">
            <button class="btn btn-link p-0" type="submit" name="report">Signaler</button>
          </form>
        <?php } else { ?>
            <p style="color: red;">Signalé</p>
        <?php } ?>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="jumbotron">
        <h2 class="font-normal text-center"> Ajouter un commentaire</h2>
        <form action="#" method="post">
          <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="comment"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
        </form>
      </div>
    </div>

    <?php include_once 'views/includes/footer.php' ?>

  </body>
</html>
