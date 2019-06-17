<?php


namespace TaskManager\Database;


class DataStore
{
    /**
     * DataStore constructor.
     */
    public function __construct() {
        add_action('save_post_tache', [$this, "save_tache_data_to_database"]);
    }

    public function save_tache_data_to_database( $post_id )
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "tasks";

        if (array_key_exists('tache_field', $_POST)){
            $wpdb->insert($table_name, array(
                'post_id' => $post_id,
                'fictionnal_text' => $_POST["tache_field"]
            ),array (
                '%s',
                '%s')
            );
        }

    }
}