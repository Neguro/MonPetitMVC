<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IdentificationController
 *
 * @author ahmedali.nassim
 */

namespace APP\Controller;

use APP\Model\GestionClientModel;
use ReflectionClass;
use \Exception;

class GestionClientController {
    // La classe GestionClientController va stocker toutes les méthodes concernant la gestion les clients.
    public function chercheUn($param) {
        // appel de la methode find($id) de la classe model adequate
        $model = new GestionClientModel();
        $id = filter_var(intval($param["id"]), FILTER_VALIDATE_INT);
        $unClient = $model->find($id);
        if ($unClient)
        {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";
        }
        else
        {
            throw new Exception("Client " . $id . " inconnu"); 
        }  
    }
    
    public function chercheTous()
    {
        $model = new GestionClientModel();
        $clients = $model->findAll();
        if($clients)
        {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";
        }
        else
        {
            throw new Exception("Aucun Client a afficher");
        }
    }
    
    
}
