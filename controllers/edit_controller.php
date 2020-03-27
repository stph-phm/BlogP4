<?php
$article = new Articles($_GET['id']);

if (isset($_POST['edit'])) {
    Articles::updateArticle($article->id, $_POST['title'], $_POST['content']);
    header('Location: article?id=' . $article->id);
}
