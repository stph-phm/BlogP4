<?php
class Articles
{
    public $id;
    public $title;
    public $content;
    public $date_article;

    /**
    * Récupération d'un seul article en fonction de l'id passé en param
    * @param $id (int)
    * @return object
    */
    public function __construct($id)
    {
        global $db;

        $id = str_secur($id);

        $reqArticle = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $reqArticle->execute([$id]);

        $data = $reqArticle->fetch();

        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->date_article = $data['date_article'];
    }

    /**
    * Récupération de tous les articles
    * @return array
    */
    public static function getAllArticles()
    {
        global $db;

        $reqArticles = $db->query('SELECT * FROM articles');

        return $reqArticles->fetchAll();
    }

    /**
    * Récupération du dernier article
    * @return array
    */
    public static function getLastArticle()
    {
        global $db;

        $reqArticle = $db->prepare('SELECT * FROM articles ORDER BY id DESC LIMIT 1');
        $reqArticle->execute([]);

        return $reqArticle->fetch();
    }

    /**
    * Récupération des deux premiers articles
    * @return array
    */
    public static function getFirstArticles()
    {
        global $db;

        $reqArticle = $db->query('SELECT * FROM articles ORDER BY id ASC LIMIT 2');

        return $reqArticle->fetchAll();
    }

    /**
    * Création d'un article
    * @param $title $content
    */
    public static function createArticle($title, $content)
    {
        global $db;

        $title = str_secur($title);

        $reqArticle = $db->prepare('INSERT INTO articles(title, content, date_article) VALUES(:title, :content, NOW())');
        $reqArticle->execute(["title" => $title, "content" => $content]);
    }

    /**
    * Mise à jour d'un article
    * @param $id $title $content
    */
    public static function updateArticle($id, $title, $content)
    {
        global $db;

        $id = str_secur($id);
        $title = str_secur($title);

        $reqArticle = $db->prepare('UPDATE articles
          SET title = :title, content = :content, date_article = NOW() WHERE id = :id');
        $reqArticle->execute(["id" => $id, "title" => $title, "content" => $content]);
    }

    /**
    * Suppréssion d'un article
    * @param $id
    */
    public static function deleteArticle($id)
    {
        global $db;

        $id = str_secur($id);

        $reqArticle = $db->prepare('DELETE FROM articles a, comments c WHERE a.id = $id AND c.article_id');
    }
}
