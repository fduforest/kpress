<?php global $wpdb;?>
<div class="wrap wpbs-wrap">
    <div id="icon-themes" class="icon32"></div>
    <h2><?php _e('Sync');?></h2>
    
    <?php $sql = 'SELECT * FROM ' . $wpdb->prefix . 'bs_calendars';?>
    <?php $rows = $wpdb->get_results( $sql, ARRAY_A );?>
    
    <?php if($wpdb->num_rows > 0):?>
    <table class="widefat wp-list-table wpbs-table wpbs-table-ical wpbs-table-800">
        <thead>
            <tr>
                <th class="wpbs-table-id"><?php echo __('ID','wpbs')?></th>
                <th><?php echo __('Calendar Title','wpbs')?></th>   
                <th style="width: 80%;"><?php echo __('iCalendar Link','wpbs')?></th>
                
            </tr>
        </thead>
        
        <tbody>                
            <?php $i=0; foreach($rows as $calendar):
            if( ! (current_user_can( 'manage_options' ) || @in_array( get_current_user_id(), json_decode($calendar['calendarUsers']) )) ) continue;?>
            <?php $bCount = 'SELECT bookingRead FROM ' . $wpdb->prefix . 'bs_bookings WHERE calendarID = '.$calendar['calendarID'].' AND bookingRead=0';?>
            <?php $wpdb->get_results( $bCount, ARRAY_A ); ?>
            
            
            <tr<?php if($i++%2==0):?> class="alternate"<?php endif;?>>
                <td class="wpbs-table-id">#<?php echo $calendar['calendarID']; ?></td>
                <td class="post-title page-title column-title">
                    <strong><a class="row-title" href="<?php echo admin_url( 'admin.php?page=wp-booking-system&do=edit-calendar&id=' . $calendar['calendarID']);?>"><?php echo $calendar['calendarTitle']; ?></a><div class='wpbs-count wpbs-count-<?php echo $wpdb->num_rows;?>'><?php echo $wpdb->num_rows;?></div></strong>
                    <div class="row-actions">
                        <span class="edit"><a href="<?php echo admin_url( 'admin.php?page=wp-booking-system&do=edit-calendar&id=' . $calendar['calendarID']);?>" title="<?php echo __("Edit this item",'wpbs') ;?>"><?php echo __("Edit",'wpbs') ;?></a> | </span>
                        <span class="trash"><a onclick="return confirm('<?php echo __("Are you sure you want to delete this calendar?",'wpbs') ;?>');" class="submitdelete" href="<?php echo admin_url( 'admin.php?page=wp-booking-system&do=calendar-delete&id=' . $calendar['calendarID'] . '&noheader=true');?>"><?php echo __("Delete",'wpbs') ;?></a></span>
                    </div>
                </td>
                <td><span class="wpbs-ical-link" onclick="wpbs_select_text(this);"><?php echo site_url();?>/?wp-booking-system-ical=<?php echo $calendar['calendarID'];?></span></td>
                
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php else:?>
        <?php echo __('No calendars found.','wpbs')?> <a href="<?php echo admin_url( 'admin.php?page=wp-booking-system&do=edit-calendar');?>"><?php echo __("Click here to create your first calendar.",'wpbs') ;?></a>
    <?php endif;?>
    
</div>