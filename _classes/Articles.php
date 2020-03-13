<?php


class Articles {

    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $author;
 
    /**
     * Articles constructor
     * @param $id (articles)
     */
    function __construt($id) {
        global $db; 

        $id = str_secur($id);

        $reqArticle = $db->prepare('
            SELECT a.*, au.firstname, au.lastname
            FROM articles a
            INNER JOIN authors au ON au.id = a. author_id
            WHERE a.id = ?
         '); 

        $reqArticle->execute([$id]);
        $data = $reqArticle->fetch();

        // changement des propriétés de l'objet pour qu'elles deviennent les propriétés actuelles
        $this->id       = $id;
        $this->title    = $data['title'];
        $this->sentence = $data['sentence'];
        $this->content  = $data['content'];
        $this->date     = $data['date'];
        $this->author   = $data['firstname'] . ' ' . $data['lastname'];
    }


    /**
     * Envoie tous les articles 
     * @return array
     */
    static function getAllArticles() {
        
        global $db; 

        $reqArticles = $db->prepare('
            SELECT * 
            FROM articles 
            INNER JOIN authors au ON au.id = a.author_id
            ORDER BY id DESC
            LIMIT 5        
        '); // Mettre en place le lien commentaire 
        $reqArticles->execute([]);
        return $reqArticles->fetchAll();
    }

}