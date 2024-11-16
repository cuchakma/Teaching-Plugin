<?php

class Helper {
    public static function get_notes() {
        global $wpdb;
        $notes = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}notes;", ARRAY_A );
        return $notes;
    }
}