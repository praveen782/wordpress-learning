<?php

function User_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/crud-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Users</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=User_create'); ?>">Add New</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "Usertable";

        $rows = $wpdb->get_results("SELECT id,name,email,phone from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Name</th>
                <th class="manage-column ss-list-width">Email</th>
                <th class="manage-column ss-list-width">Phone</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->email; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->phone; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=User_update&id=' . $row->id); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}