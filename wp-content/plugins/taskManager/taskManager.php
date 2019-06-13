<?php
/*
Plugin Name: the Running Rabbits's Task Manager
Plugin URI: 
Description: Un petit plugin pour gérer les tâches d'un projet.
Version: 0.1
Author: the Running Rabbits: Jean-Marie Coen, David Lelièvre, Pascal Levesque
Author URI: 
License: GPLv2 or later
Text Domain: 
*/

namespace TaskManager;

require  __DIR__ . '/vendor/autoload.php';

use classes\CustomPost\Tasks;
use Data\Datatable;
use Routes\RouteManager;

class TaskManager {
    /**
   * TaskManager constructor.
   * @usage Add all needed classes initialization.
   */
  public function __construct()
  {
      add_action( 'init', [ $this, 'init' ] );
      register_activation_hook( __FILE__, [ $this, 'init_data' ] );
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

new TaskManager();