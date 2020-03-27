<?php
class Comments
{
    public $id;
    public $pseudo;
    public $comment;
    public $date_com;
    public $reported;
    public $article_id;

    /**
    * Retrieval of all comments of the article passed in param
    * @param $article (int)
    * @return array
    */
    public static function getAllComments($article)
    {
        global $db;

        $article = str_secur($article);

        $reqComments = $db->prepare('SELECT * FROM comments WHERE article_id = ? ORDER BY id ASC');
        $reqComments->execute([$article]);

        return $reqComments->fetchAll();
    }

    /**
    * Retrieving all reported comments
    * @return array
    */
    public static function getAllReported()
    {
        global $db;

        $reqComments = $db->query('SELECT * FROM comments WHERE reported = 1');

        return $reqComments->fetchAll();
    }

    /**
    * Comments add
    * @param $article (int), $pseudo (str), $comment (str)
    */
    public static function addComment($article, $pseudo, $comment)
    {
        global $db;

        $article = str_secur($article);
        $pseudo = str_secur($pseudo);
        $comment = str_secur($comment);

        $reqComment = $db->prepare('INSERT INTO comments(pseudo, comment, date_com, reported, article_id)
        VALUES(:pseudo, :comment, NOW(), 0, :article_id)');
        $reqComment->execute(["pseudo" => $pseudo, "comment" => $comment, "article_id" => $article]);
    }

    /**
    * Report comment
    * @param $id (int)
    */
    public static function reportComment($id)
    {
        global $db;

        $id = str_secur($id);

        $reqComment = $db->prepare('UPDATE comments SET reported = 1 WHERE id = ?');
        $reqComment->execute([$id]);
    }

    /**
    * ignore reporting a comment
    * @param $id (int)
    */
    public static function ignoreComment($id)
    {
        global $db;

        $id = str_secur($id);

        $reqComment = $db->prepare('UPDATE comments SET reported = 0 WHERE id = ?');
        $reqComment->execute([$id]);
    }

    /**
    * Suppression d'un commentaire
    * @param $id (int)
    */
    public static function deleteComment($id)
    {
        global $db;

        $id = str_secur($id);

        $reqComment = $db->prepare('DELETE FROM comments WHERE id = ?');
        $reqComment->execute([$id]);
    }
}
