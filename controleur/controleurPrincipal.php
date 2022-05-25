<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "controleur.menu.php";
    $lesActions["session"] = "controleur.gosession.php";
    $lesActions["inscription"] = "controleur.inscription.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}
