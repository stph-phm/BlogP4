<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once 'views/includes/head.php'?>
  </head>
  <body>
    <?php include_once 'views/includes/nav.php'?>

    <?php if ($_SESSION) { ?>
      <div class="container my-4">
              <div class="accordion" id="admin_panel">
                <div class="card">
                  <div class="card-header bg-dark" id="list_chapitres">
                    <h2 class="mb-0 w-100 d-flex justify-content-between">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#chapitres" aria-expanded="true" aria-controls="chapitres">
                        Liste des chapitres
                      </button>
                      <a href="newarticle" class="btn btn-success btn-sm">Ajouter</a>
                    </h2>
                    </div>
                    <div id="chapitres" class="collapse" aria-labelledby="list_chapitres" data-parent="#admin_panel">
                      <div class="card-body">
                        <table>
                          <thead>
                            <tr>
                              <th>Titre</th>
                              <th>Extrait</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  foreach ($listArticles as $index => $preview): ?>
                            <tr>
                              <td><?= $preview['title']?></td>
                              <td><?= substr($preview['content'], 0, 100) ?></td>
                              <td>
                                <a href="article?id=<?= $preview['id'] ?>">Voir</a>
                                <a href="edit?id=<?= $preview['id'] ?>">Modifier</a>
                                <form class="" action="admin?article=<?= $preview['id'] ?>" method="post">
                                  <button type="submit" name="delete">Supprimer</button>
                                </form>
                              </td>
                            </tr>
                            <?php  endforeach;?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                  <div class="card-header bg-dark" id="list_report">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#reported" aria-expanded="true" aria-controls="reported">
                        Commentaires signalés
                      </button>
                    </h2>
                    </div>
                    <div id="reported" class="collapse " aria-labelledby="list_report" data-parent="#admin_panel">
                    <div class="card-body">
                      <table>
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
                                <button type="submit" name="ignore">Ignorer</button>
                                <button type="submit" name="delete">Supprimer</button>
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
        } else {
            echo 'Accès refusé';
        } ?>
      </div>

    <?php include_once 'views/includes/footer.php' ?>
  </body>
</html>
