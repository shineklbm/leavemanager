<div>
    <?php screen_icon(); ?>
    <h2>Leave Manager Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'leavemanager_options_group' ); ?>
        <?php do_settings_sections( 'leavemanager_options_group' ); ?>
        <p> Please choose a page to display the "Apply for Leave" form from the page dropdown bellow</p>        
        <table>
            <tr valign="top">
                <th scope="row"><label for="leavemanager_page_id">Choose</label></th>
                <td>
                    <?php 
                        $selected = get_option('leavemanager_page_id');
                        $options =  array(
                                        'id' => 'leavemanager_page_id', 
                                        'name' => 'leavemanager_page_id', 
                                        'echo' => 1,
                                        'show_option_none' => __( '&mdash; Select &mdash;' ),
                                        'option_none_value' => '0',
                                        'selected' => $selected
                                    );
                        wp_dropdown_pages($options); 
                    ?>
                </td>
            </tr>
        </table>
        <?php  submit_button(); ?>
    </form>
</div>
