<?php

add_action('wp_db_backup_completed', array('WPDBBackupLocal', 'wp_db_backup_completed'),11);

class WPDBBackupLocal {

    public static function wp_db_backup_completed(&$args) {
        $wp_db_local_backup = get_option('wp_db_local_backup');
        $wp_db_local_backup_path = get_option('wp_db_local_backup_path');
        if ( true == isset( $wp_db_local_backup ) && $wp_db_local_backup == 1
              && false == empty( $wp_db_local_backup_path ) && true == file_exists( $wp_db_local_backup_path ) ) {
            $file = $args[1];
            $filename = $args[0];
            $wp_db_local_backup_file = $wp_db_local_backup_path.'/'.$filename;
            $filesze = $args[3];

              if ( false == copy( $file, $wp_db_local_backup_file ) ) {
                    error_log( "failed to copy $wp_db_local_backup_path" );
                } else {
                    error_log( "copied into local backup path" );
                    $args[2] = $args[2] .' <br>'. __( 'Upload Database Backup on ', 'wp-database-backup') . $wp_db_local_backup_path;
                    $args[4] = $args[4] .="Local Path, ";
                }
        }
    }

}
