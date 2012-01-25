<?php function my_bp_adminbar_notifications_menu() {
	global $bp;
 
	if ( is_user_logged_in() )
		return false;
 
	echo '<li id="bp-adminbar-notifications-menu"><a href="' . $bp->loggedin_user->domain . '">';
	_e( 'Notifications', 'buddypress' );
 
	if ( $notifications = bp_core_get_notifications_for_user( $bp->loggedin_user->id ) ) { ?>
		<span><?php echo count($notifications) ?></span>
	<?php
	}
 
	echo '</a>';
	echo '<ul>';
 
	if ( $notifications ) { ?>
		<?php $counter = 0; ?>
		<?php for ( $i = 0; $i < count($notifications); $i++ ) { ?>
			<?php $alt = ( 0 == $counter % 2 ) ? ' class="alt"' : ''; ?>
			<li <?php echo $alt ?>><?php echo $notifications[$i] ?></li>
			<?php $counter++; ?>
		<?php } ?>
	<?php } else { ?>
		<li><a href="<?php echo $bp->loggedin_user->domain ?>"><?php _e( 'No new notifications.', 'buddypress' ); ?></a></li>
	<?php
	}
 
	echo '</ul>';
	echo '';
}
?>
 
<?php
apply_filters("swa_load_css","disable_swa_css");
 
function disable_swa_css(){
return false;
}
?>
</ul></a>