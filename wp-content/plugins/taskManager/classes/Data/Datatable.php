<?php


namespace Uber\Data;


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
        $sql = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "ubertasks`(
            ID bigint(20) NOT NULL auto_increment,
            post_id varchar(255) default NULL,
            user_id bigint(20),
            PRIMARY KEY  (`ID`)
        );";
        dbDelta( $sql );
    }
}