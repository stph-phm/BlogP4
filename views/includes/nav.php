<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home">Billet simple pour l'Alaska</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <?php foreach ($articles as $index => $articleLink): ?>
      <li class="nav-item active">
        <a class="nav-link" href="article?id=<?= $articleLink['id'] ?>"><?= $articleLink['title'] ?></a>
      </li>
        <?php endforeach; ?>
    </ul>

  </div>
  <?php if ($_SESSION) { ?>
    <form class="form-inline my-2 my-lg-0" action="#" method="post">
      <a class="btn btn-link btn-sm px-2" href="admin">Administration</a>
      <button type="submit" class="btn btn-danger btn-sm" name="deconnexion">Se déconnecter</button>
    </form>
  <?php } ?>
</nav>
