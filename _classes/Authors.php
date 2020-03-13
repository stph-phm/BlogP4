<?php

class Authors {

    public $id;
    public $firstname;
    public $lastname; 

    /**
     * Authors constructor 
     * @param $id
     */
    function __construct($id) {
        
        global $db;

        $d = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM authors WHERE od = ? ');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        // changement des propriétés de l'objet pour qu'elles deviennent les propriétés actuelles
        $this->id = $id;
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
    }


    /**
     * Envoie de tous les auteurs 
     * @return array
     */
    static function getAllAuthors() {

        global $db; 

        $reqAuthors = $db->prepare('SELECT * FROM authors'); 
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();
    }
}
