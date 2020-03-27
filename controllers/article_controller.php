<?php
$article = new Articles($_GET['id']);

$comments = Comments::getAllComments($article->id);

if (isset($_POST['report'])) {
    Comments::reportComment($_GET['report']);
    header('Location: article?id=' . $article->id);
}

if (isset($_POST['envoyer'])) {
    Comments::addComment($article->id, $_POST['pseudo'], $_POST['comment']);
    header('Location: article?id=' . $article->id);
}
