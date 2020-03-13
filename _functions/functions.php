<?php
/**
* Permet de sécuriser une chaine de caractère
* @param $string
* @return $string
*/
function str_secur($string)
{
    return trim(htmlspecialchars($string));
}

/**
 * Permet de sécuriser les mots de passe pour la connexion administrateur 
 * @param $string
 * @return $string
 */
function sha1_secur($string)
{
    return sha1($string);
}

/**
* Debug plus lisible des différentes variables
* @param $var
*/
function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
