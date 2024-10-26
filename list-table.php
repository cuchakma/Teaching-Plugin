<?php

if ( class_exists( 'WP_List_Table' ) ) {
    class ListTable extends WP_List_Table {

        public function __construct( $args ) {
            parent::__construct( $args );
        }

        public function column_default( $item, $column_name ) {
            switch ( $column_name ) {
                case 'note-name':
                    return "<span>" . $item['note-name'] . "</span>";
                case 'date':
                    return "<span>" . $item['date'] . "</span>";
                case 'content':
                    return "<span>" . $item['content'] . "</span>";
                case 'created-time':
                    return "<span>" . $item['created-time'] . "</span>";
            }
        }

        public function dummy_data() {
            return [
                ['note-name' => 'Note 1', 'date' => '21/05/1994', 'content' => 'This is a test content', 'created-time' => '09/12'],
                ['note-name' => 'Note 2', 'date' => '21/05/1994', 'content' => 'This is a test content 2', 'created-time' => '09/12']
            ];
        }

        public function get_columns() {
            $columns = [
                'note-name'    => __( "Note Title", "tanjila" ),
                'date'         => __( "Date", "tanjila" ),
                'content'      => __( "Content", "tanjila" ),
                'created-time' => __( "Created Time", "tanjila" )
            ];

            return $columns;
        }

        public function prepare_items() {
            $columns               = $this->get_columns();
            $hidden                = [];
            $sortable              = [];
            $this->_column_headers = [$columns, $hidden, $sortable];
            $this->items           = $this->dummy_data();
        }
    }

}
