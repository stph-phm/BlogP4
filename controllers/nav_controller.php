<?php
$articles = Articles::getAllArticles();

if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('Location: #');
}
