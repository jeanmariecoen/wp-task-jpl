<?php

namespace Uber\Routes;

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
