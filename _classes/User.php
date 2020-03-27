<?php
class User
{
    public $id;
    public $username;
    public $password;
    public $date_user;

    /**
    * Récupération de l'utilisateur
    * @param $id (int)
    */
    public function __construct($username)
    {
        global $db;

        $username = str_secur($username);

        $reqUser = $db->prepare('SELECT * FROM users WHERE username = ?');
        $reqUser->execute([$username]);

        $data = $reqUser->fetch();

        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->date_user = $data['date_user'];
    }

    /**
    * Ajout d'un utilisateur
    * @param $username $password
    */
    public static function addUser($username, $password)
    {
        global $db;

        $username = str_secur($username);
        $password = password_hash($password);

        $reqUser = $db->prepare('INSERT INTO users(username, password, date_user) VALUES(:username, :password, NOW())');
        $reqUser->execute(["username" => $username, "password" => $password]);
    }

    /**
    * Mise à jour d'un utilisateur
    * @param $id $username $password
    */
    public static function updateUser($id, $username, $password)
    {
        global $db;

        $id = str_secru($id);
        $username = str_secur($username);
        $password = password_hash($password);

        $reqUser = $db->prepare('UPDATE users SET username = :username, password = :password');
        $reqUser->execute(["username" => $username, "password" => $password]);
    }

    /**
    * Suppression d'un utilisateur
    * @param $id
    */
    public static function deleteUser($id)
    {
        global $db;

        $reqUser = $db->prepare('DELETE FROM users WHERE id = ?');
        $reqUser->execute([$id]);
    }
}
