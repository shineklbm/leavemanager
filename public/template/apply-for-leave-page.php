<?php
    if (!empty($_POST)){
        if (isset ($_POST['from_date']) && (trim($_POST['from_date']) !== '')) {
            $from_date =  $_POST['from_date'];
        } else {
            echo 'Please enter a valid from date';
        }
        if (isset ($_POST['to_date']) && (trim($_POST['to_date']) !== '')) {
            $to_date = $_POST['to_date'];
        } else {
            echo 'Please enter a valid to date';
        }

        if (isset ($_POST['reason_for_leave']) && (trim($_POST['reason_for_leave']) !== '')) {
            $reason_for_leave = $_POST['reason_for_leave'];
        } else {
            echo 'Please enter reason for leave';
        }

        if (isset ($_POST['user']) && (trim($_POST['user']) !== '')) {
            $backup_employee = $_POST['user'];
        } else {
            echo 'Please enter reason for leave';
        }

        $current_user = wp_get_current_user();

        $leave_request_details =    "Leave requested by" . $current_user->display_name.
                                    "From - $from_date"."<br>".
                                    "To - $to_date "."<br>".
                                    "Reason to leave ".$reason_for_leave.
                                    "Backup Employee ". $backup_employee;

        $title = "Leave request from ".$current_user->user_firstname;

        $post = array(
            'post_title'	=> $title,
            'post_content'	=> $leave_request_details,
            'post_status'	=> 'publish',
            'post_type'	    => 'leave_requests'
        );
        $result = wp_insert_post($post);
        if ($result){
            echo "The leave application has been successfully submitted!";
        }
        do_action('wp_insert_post', 'wp_insert_post');
    }
    
?>
        <form method="POST">
            <p>
                <label for="form_date">From Date</label><br />
                <input type="date" id="from_date" value="" tabindex="1" size="20" name="from_date" required/>
            </p>
            <p>
                <label for="form_date">To Date</label><br />
                <input type="date" id="to_date" value="" tabindex="1" size="20" name="to_date" required/>
            </p>
            <p>
                <label for="reason_for_leave">Reason for leave</label><br />
                <textarea id="reason_for_leave" tabindex="3" name="reason_for_leave" cols="50" rows="6" required></textarea>
            </p>

            <p>
                <label for="reason_for_leave">Backup Employee</label><br />
                <?php wp_dropdown_users( array('role'=>'employee')); ?>
            </p>
            <p align="right">
                <input type="submit" value="Send Request" tabindex="6" id="submit" name="submit" />
            </p>
            <?php wp_nonce_field( 'new-post' ); ?>
        </form>