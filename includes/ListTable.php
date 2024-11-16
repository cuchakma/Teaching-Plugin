<?php

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
    require_once ABSPATH . 'wp-admin/includes/screen.php';
}

class ListTable extends \WP_List_Table {

    public $notes;

    public function __construct( $args ) {
        $this->notes = $args;
        parent::__construct( $args );
    }

    public function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            case 'id':
                return "<span>" . $item['id'] . "</span>";
            case 'note_title':
                return "<span>" . $item['note_title'] . "</span>";
            case 'date':
                return "<span>" . $item['date'] . "</span>";
            case 'content':
                return "<span>" . $item['content'] . "</span>";
            case 'time':
                return "<span>" . $item['time'] . "</span>";
        }
    }

    public function get_columns() {
        $columns = [
            'id'         => __( 'Id', 'tanjila' ),
            'note_title' => __( "Note Title", "tanjila" ),
            'date'       => __( "Date", "tanjila" ),
            'content'    => __( "Content", "tanjila" ),
            'time'       => __( "Created Time", "tanjila" )
        ];

        return $columns;
    }

    public function prepare_items() {
        $columns               = $this->get_columns();
        $hidden                = [];
        $sortable              = [];
        $this->_column_headers = [$columns, $hidden, $sortable];
        $this->items           = $this->notes;
    }
}