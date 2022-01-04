<?php 

use App\Controllers\Controller;

/**
 * Ce script tient lieu de router pour l'application.
 * 
 * Il est appelé à chaque requête (voir fichier .htaccess)
 * 
 * Il analyse les requêtes reçues et détermine :
 * - le controller à utiliser,
 * - l'action (méthode) à exécuter,
 * - transmet les éventuels paramètres supplémentaires à la méthode. 
 * 
 * Exemples :
 * http://localhost/lessons/modify/12 appelera la méthode modify() du controller LessonsController avec le paramètre 12
 * 
 */

/** L'autoloader fourni par composer est chargé à chaque requête */
require './vendor/autoload.php';

define('ROOT', __DIR__);

/** trim() : supprimme les caractères `/` au début et à la fin du paramètre passé dans l'url */
$request = trim($_GET['p'], '/');

/** 
 * Transforme la chaîne en tableau :
 * string : controller/action/param
 * array  : 
 *  0   =>  controller
 *  1   =>  action
 *  2   =>  param
 */
$params = explode( '/', $request );

/** 
 * Si le premier paramètre est vide 
 * => url = http://localhost/
 * => c'est la page d'accueil 
 */
if(empty($params[0])) {
    $controller = "App\\Controllers\\HomeController";
} else {
    $controller = "App\\Controllers\\" . ucfirst($params[0]) . 'Controller';
}

/** 
 * Si le deuxième paramètre est vide 
 * => url = http://localhost/controller
 * => on attribue une action "par défaut" (par exemple la liste des entités) 
 */
if(empty($params[1])) {
    $action = 'index';
} else {
    $action = $params[1]; 
}

/**
 * On vérifie que la méthode (action) existe pour le controller
 * Si ce n'est pas le cas (soit le controller n'existe pas, soit l'action n'appartient pas au controller)
 * => controller/action non prévu dans l'application
 * => la page demandée n'existe pas
 */
if( method_exists( $controller, $action )) {
    $call = new $controller();
    $call->$action();
} else {
    require ROOT . '/src/Views/404.php';

}