<?php 
/**
 * Plugin name: Classcode
 * Plugin URI: https:/fakewebsite.com/classcode
 * Description: Exemple de structure pour un plugin
 * Version: 0.1
 * Author: Jipi Lambert
 * Author URI: takodevweb.com
 */

namespace Uber;
use Uber\Tasks;

class Ubermanager
{
  public function __construct()
  {
    add_action('init', [$this, 'init']);
    register_activation_hook(__FILE__, [$this, 'initData']); // identifie le fichier qu'on va aller chercher
  }
  
  public function init()
  {
    new Tasks();
    new RouteManager();
  }

  // créer la table dans la base de données
  public function initData()
  {
    new Datatable();
  }
}

Créer une classe Tasks (post_type)
// reprendre code classique pour créer un custom_post_type
// mettre 'uber' comme slug pour les langues (pour + tard, quand on devra localiser sur le marché de l'emploi)

Créer une classe Datatable
// Qu'est-ce que j'enregistre, et où ?
// - date de création
// - date de modification
// - auteur
// Piège: seule chose à metre dans notre table, c'est des liens vers le user puis le ID de la tâche qui va avec l'utilisateur.
// On va partir de la table posts (et comments) de WP. En fait on n'a presque rien à ajouter dans notre nouvelle table.
// Parce que la programmation, c'est d'abord un job d'observation: lire le code qui existe déjà.
//  2e étape: créer mon initialisation pour les données, donc créer ma table.

Créer une classe Routes
// J'ai 4 routes. Dois-je créer un manager pour ça ? Oui: penser à plus tard, que peut-être oin va en ajouter d'autres.
// les routes à créer: user, tasks, comments
// en lien avec l'API de WordPress

class RouteManager
{
  public function __construct()
  {
    // le hook rest_api_init vient direct de la documentation de Wordpress: permet d'ajouter des routes à l'API
    add_action('rest_api_init', [$this, 'routes']);
  }
  
  public function routes()
  {
    // On va créer une Façade: TaskRoutes
    // Parce qu'il se pourrrait que je crée des routes pour les Comments, pour les Users (mais ça existe déjà dans WP), etc.
    // Le code en sera plus lisible et plus facile à maintenir.
    new TaskRoutes();
  }
}

Je crée maintenant la Façade.
class TaskRoutes
{
  public function __construct()
  {
    $this->create_task_routes();
  }
  
  public function create_task_routes()
  {
    register_rest_route(namespace 'ubermanager/v0', route '/tasks/(?P<id>\d+)', array(
      'methods' => 'POST',
      'callback' => [$this, 'create_task']
    ));

    register_rest_route(namespace 'ubermanager/v0', route '/tasks/(?P<id>\d+)', array(
      'methods' => 'GET',
      'callback' => [$this, 'get_all_tasks']
    ));

  }

  public function get_all_tasks()
  {
    $args = array(
      'post_type' => 'ubertasks',
      'post_status' => 'publish',
      'post_per_page' => ''
    );
    $query = new \WP_Query( $args );
    return rest_ensure_response()
  }

  public function get_task_with_id()
  {
    $args = array(
      'post_type' => 'ubertasks',
      'post_status' => 'publish',
      'post_per_page' => ''
    );
    $query = new \WP_Query( $args );
    return rest_ensure_response()
  }

  public function create_task()
  {
    $args = [
      'post_title' => 'Tarabuster les pommes de terre'
    ]

    )
  }
}