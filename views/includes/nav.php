<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="home">Billet simple pour l'Alaska</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-item active" href="#" id="navbarDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tous les chapitres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach ($articles as $index => $articleLink): ?>
          <a class="dropdown-item text-center"
            href="article?id=<?= $articleLink['id']?>"><?= $articleLink['title']?></a>
          <?php endforeach; ?>
        </div>
      </li>
    </ul>

    <?php if ($_SESSION) { ?>

    <form class="connect form-inline my-2 my-lg-0 d-flex " action="#" method="post">
      <a class=" btn btn-primary btn-sm m-2" href="admin"> <span><i class="fas fa-user"></i></span> Administration</a>
 
      <button type="submit" class="btn btn-danger btn-sm m-2" name="deconnexion"><span> <i class="fas fa-sign-out-alt"></i> </span> Se déconnecter</button>
    </form>

    <?php } ?>
  </div>
</nav>