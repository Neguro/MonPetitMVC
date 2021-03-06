<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionClientModel
 *
 * @author ahmedali.nassim
 */
namespace APP\Model;

use PDO;
use APP\Entity\Client;
use Tools\Connexion;


class GestionClientModel {
    // La GestionClientModel va implémenter les méthodes d'accès à la BD qui concernent les clients
    
    public function find($id) 
    {
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne = $unObjetPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Client::class);
    }
    
    public function findAll() 
    {
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT";
        $lignes = $unObjetPdo->query($sql);
        return $lignes->fetchAll(PDO::FETCH_CLASS, Client::class);
    }
    
    
}
