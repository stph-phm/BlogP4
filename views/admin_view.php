<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once 'views/includes/head.php'?>
  </head>
  <body>
    <?php include_once 'views/includes/nav.php'?>

    <?php if ($_SESSION) { ?>
      <div class="container ">
              <div class="accordion" id="admin_panel">
                <div class="card">
                  <div class="card-header bg-dark" id="list_chapitres">
                    <h2 class="mb-0 w-100 d-flex justify-content-between">
                      <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#chapitres" aria-expanded="true" aria-controls="chapitres">
                        Liste des chapitres
                      </button>
                      <a href="newarticle" class="btn btn-success btn-sm"> Ajouter <span><i class="fas fa-plus"></i></span> </a>
                    </h2>
                    </div>

                    <div id="chapitres" aria-labelledby="list_chapitres" data-parent="#admin_panel">
                      <div class="card-body">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Titre</th>
                              <th>Extrait</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  foreach ($listArticles as $index => $preview): ?>
                            <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $preview['title']?></td>
                              <td><?= substr($preview['content'], 0, 100) ?></td>
                              <td class="col-4">
                              <form class="" action="admin?article=<?= $preview['id'] ?>" method="post">
                                <a class="btn btn-secondary" href="article?id=<?= $preview['id'] ?>"> <span i class="fas fa-eye"></i> </span> Voir</a>

                                <a class="btn btn-primary" href="edit?id=<?= $preview['id'] ?>"> <span i class="fas fa-pencil-alt"></i> </span> Modifier</a>

                                
                                
                                  <button type="submit" name="deleteArticle" class="btn btn-danger"> <span i class="fas fa-times"></i> </span> Supprimer</button>

                                </form>
                              </td>
                            </tr>
                            <?php  endforeach;?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-4">
                  <div class="card-header bg-dark" id="list_report">
                    <h2 class="mb-0">
                      <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#reported" aria-expanded="true" aria-controls="reported">
                        Commentaires signalés
                      </button>
                    </h2>
                    </div>
                    <div id="reported" class="collapse " aria-labelledby="list_report" data-parent="#admin_panel">
                    <div class="card-body">
                      <table  class="table table-striped table-bordered">
                        <thead>
                          <tr>

                            <th>Pseudo</th>
                            <th>Commentaire</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  foreach ($reportedComments as $index => $comment): ?>
                          <tr>

                            <td><?= $comment['pseudo']?></td>
                            <td><?= $comment['comment'] ?></td>
                            <td><?= date_format(date_create($comment['date_com']), 'd/m/Y H:i') ?></td>
                            <td>

                              <form class="" action="admin?comment=<?= $comment['id'] ?>" method="post">

                                <button class="btn btn-primary" type="submit" name="ignore">Ignorer</button>

                                <button class="btn btn-danger" type="submit" name="delete"><span i class="fas fa-times"></i> </span> Supprimer</button>
                              </form>
                              

                            </td>
                          </tr>
                          <?php  endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php
        } else { ?>
           <div class="container mb-4">
              <h1 class="text-danger text-center"> ACCES REFUSE  </h1>
           </div>
            <?php
        } ?>
      </div>

    <?php include_once 'views/includes/footer.php' ?>
  </body>
</html>
