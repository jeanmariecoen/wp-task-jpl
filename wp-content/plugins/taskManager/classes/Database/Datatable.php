<?php


namespace TaskManager\Database;


class Datatable
{
    public function __construct()
    {
        $this->datatable_init();
    }

    public function datatable_init()
    {
        global $wpdb;
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        $sql = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "tp_tasks` (
            ID bigint(20) NOT NULL auto_increment,
            post_id bigint(20) default NULL,
            proprietary_user_id bigint(20) default NULL,
            assigned_user_id bigint(20) default NULL,
            task_status varchar(255),
            PRIMARY KEY  (`ID`),
            FOREIGN KEY (`post_id`) REFERENCES wp_posts(`ID`),
            FOREIGN KEY (`proprietary_user_id`) REFERENCES wp_users(`ID`),
            FOREIGN KEY (`assigned_user_id`) REFERENCES wp_users(`ID`)
        )";
        dbDelta( $sql );
    }
}