<?php

$listArticles = Articles::getAllArticles();

$reportedComments = Comments::getAllReported();

$i = 1;

if (isset($_POST["ignore"])) {
    Comments::ignoreComment($_GET['comment']);
    header('Location: admin');
}

if (isset($_POST["delete"])) {
    Comments::deleteComment($_GET['comment']);
    header('Location: admin');
}


if (isset($_POST["deleteArticle"])) {

    Articles::deleteArticle($_GET['article']);
    header('Location: #');
}
