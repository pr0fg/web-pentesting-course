<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseLocal">
                                <h2>Local Backup</h2>

                            </a>
                        </h4>
                    </div>
                    <div id="collapseLocal" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php
                            echo '<form name="wp-local_form" method="post" action="" >';
                            wp_nonce_field('wp-database-backup');
                            $wp_db_local_backup_path = get_option('wp_db_local_backup_path');
                            $wp_db_local_backup=get_option('wp_db_local_backup');
                            echo '<p>';
                            $ischecked=(isset($wp_db_local_backup) && $wp_db_local_backup==1) ? 'checked' : '';
                            echo '<div class="row form-group">
                                <label class="col-sm-2" for="wp_db_local_backup_path">Enable Local Backup:</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" '.$ischecked.' id="wp_db_local_backup_path" name="wp_db_local_backup">
                                </div>
                            </div>';
                            echo '<div class="row form-group"><label class="col-sm-2" for="wp_db_backup_email_id">Local Backup Path</label>';
                            echo '<div class="col-sm-6"><input type="text" id="wp_db_backup_email_id" class="form-control" name="wp_db_local_backup_path" value="' . $wp_db_local_backup_path . '" placeholder="Directory Path"></div>';
                            echo '<div class="col-sm-4">Leave blank if you don\'t want use this feature or Disable Local Backup</div></div>';
                            echo '<div class="row form-group">';
                            echo '<div class="col-sm-12">';
                            if ( false == empty( $wp_db_local_backup_path ) && false == file_exists( $wp_db_local_backup_path ) ) {
                                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                                     _e( 'Invalid Local Backup Path : ', 'wpdbbkp' );
                                     echo $wp_db_local_backup_path;
                                echo '</div>';
                            }
                             _e( 'Backups outside from the public_html directory or inside public_html directory but diffrent location (without using FTP).', 'wpdbbkp');
                             _e('Ex.: C:/xampp/htdocs', 'wpdbbkp' );
                             echo'</div>';
                            echo '<div class="col-sm-12 submit">';
                            echo '<input type="submit" name="Submit" class="btn btn-primary" value="Save Settings" />';
                            echo '</div>';
                            echo '</form>';
                            ?>
                        </div>
                    </div>
                </div>
