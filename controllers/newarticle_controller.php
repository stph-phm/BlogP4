<?php

if (isset($_POST['publish'])) {
    Articles::createArticle($_POST['title'], $_POST['content']);
    header('Location: admin');
}
