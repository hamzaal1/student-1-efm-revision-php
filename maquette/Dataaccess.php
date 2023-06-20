<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dataaccess
 *
 * @author pc
 */

class Dataaccess
{
    // Method for establishing a database connection
    public static function connection()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=efm', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (Exception $e) {
            echo ('Erreur : ' . $e->getMessage());
        }
    }
}


