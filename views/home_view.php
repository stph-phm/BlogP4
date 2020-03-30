<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <?php include_once 'views/includes/head.php'?>
</head>

<body>
  <?php include_once 'views/includes/nav.php'?>

  <div class="container">
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
      <div class="px-0">
        <img src="assets/images/image1.jpg" class="img-fluid" alt="Responsive image">
        <h1 class="display-4 font-italic text-center">Billet simple pour l'Alaska</h1>

        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently
          about what's most interesting in this post's contents.</p>
      </div>
    </div><!--/.jumbotron-->

    <section class="mb-4">
      <div class="md-3">
        <h2 class=" font-italic text-center border-bottom">Nouveau chapitre : </h2>
      </div>

      <div class="card">
        <div class="card-body">
          <h3 class="card-title">
            <a href="article?id=<?= $lastArticle['id'] ?>" class="text-dark"><?= $lastArticle['title'] ?></a>
          </h3>
          <p class="lead "><?= substr($lastArticle['content'], 0, 100) ?> ... <a
              href="article?id=<?= $lastArticle['id'] ?>">Lire la suite</a> </p>
        </div>
      </div>
    </section>
    </div><!--/.container-->

    <main role="main" class="container">
    <h2 class="border-bottom text-center">Les 4 premiers chapitre : </h2>
      <div class="row">
        <div class="col-md-8 blog-main">
          <?php foreach($firstArticles as $index => $article) : ?>

          <div class="blog-post">
            <h4 class="blog-post-title">
              <a href="article?id=<?= $article['id'] ?>"> <?= $article['title'] ?> </a>
            </h4>
            <p class="blog-post-meta"><?= date_format(date_create($article['date_article']), 'd/m/Y H:i') ?> </p>
            <p> <?= substr($article['content'], 0, 100) ?> <a href="article?id=<?= $article['id'] ?>"> lire la
                suite...</a> </p>
            <hr>
          </div><!-- /.blog-post -->
          <?php endforeach; ?>
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar bg-light rounded">
          <div class="p-4 mb-3 bg-light rounded">
            <img src="assets/images/img.jpg" alt="Responsive images" class="img-fluid"> <br> <br>
            <h4 class="font-italic">A propos de moi </h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit
              amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
        </aside><!-- /.blog-sidebar -->
      </div><!-- /.row -->
    </main><!-- /.container -->
  <?php include_once 'views/includes/footer.php' ?>
  
</body>

</html>