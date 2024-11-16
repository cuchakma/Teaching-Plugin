<?php

class Database {

    public function __construct() {
        register_activation_hook( __FILE__, [$this, 'create_database_table'] );
    }

    public function create_database_table() {
        global $wpdb;

        $database_creation_sql = $this->datbase_creation_sql();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $database_creation_sql );
    }

    public function datbase_creation_sql() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'notes';
        $sql        = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            note_title VARCHAR(30) NOT NULL,
            date DATE NOT NULL,
            content VARCHAR(255) NOT NULL,
            time TIME NOT NULL,
            PRIMARY KEY (id)
        );";
        return $sql;
    }
}