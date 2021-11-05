<?php


class DBConnector
{
    public static function getConnection(){
        $bdd = new PDO('mysql:host=localhost:3306;dbname=mytodolist','root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $bdd;
    }
}