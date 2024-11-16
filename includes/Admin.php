<?php

    class Admin {

        public function __construct() {
            add_action( 'admin_menu', [$this, 'register_menu'], 10 );
        }

        public function register_menu() {
            add_menu_page(
                __( 'Test Tanjila', 'tanjila' ),
                __( 'Test Plugin', 'tanjila' ),
                'manage_options',
                'notes-list',
                null,
                'dashicons-universal-access',
                5
            );

            add_submenu_page( 'notes-list', __( 'Notes List', 'tanjila' ),
                __( 'Notes List', 'tanjila' ),
                'manage_options',
                'notes-list',
                [$this, 'output_notes_list']
            );

            add_submenu_page( 'notes-list', __( 'Add New Note', 'tanjila' ),
                __( 'Add New Note', 'tanjila' ),
                'manage_options',
                'add-new-note',
                [$this, 'new_note']
            );
        }

        public function output_notes_list() {
            $list_table = new ListTable( Helper::get_notes() );
            $list_table->prepare_items();
            $list_table->display();
        }

        public function new_note() {
        ?>
                <h1>Add New Note</h1>
                <form method="post" action="">
                    <label>Note Title:</label>
                    <input type="text" name="note_title" required><br><br>

                    <label>Note Content:</label>
                    <textarea name="note_content" required></textarea><br><br>

                    <label>Date:</label>
                    <input type="date" name="note_date" required><br><br>

                    <label>Time:</label>
                    <input type="time" name="note_time" required><br><br>

                    <input type="submit" name="submit_note" value="Add Note">
                </form>
            <?php

                        // Process form submission
                        if ( isset( $_POST['submit_note'] ) ) {
                            global $wpdb;
                            $table_name = $wpdb->prefix . 'notes';

                            $wpdb->insert( $table_name, [
                                'note_title' => sanitize_text_field( $_POST['note_title'] ),
                                'content'    => sanitize_textarea_field( $_POST['note_content'] ),
                                'date'       => sanitize_text_field( $_POST['note_date'] ),
                                'time'       => sanitize_text_field( $_POST['note_time'] )
                            ] );

                            echo "<p>Note added successfully!</p>";
                        }
                }
            }