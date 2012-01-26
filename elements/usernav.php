<?php
	if ( is_user_logged_in() ) {
?>
	<?php function my_bp_adminbar_notifications_menu() {
		global $bp;
 
		if ( !is_user_logged_in() )
			return false;
 
		echo '<li id="bp-adminbar-notifications-menu"><a href="' . $bp->loggedin_user->domain . '">';
		_e( 'Notifications', 'buddypress' );
 
		if ( $notifications = bp_core_get_notifications_for_user( $bp->loggedin_user->id ) ) { ?>
			<span>[<?php echo count($notifications) ?>]</span>
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
 
		echo '</ul></a>'; 
	}
	$user = get_userdata( get_current_user_id() );
	?>
	

	<ul id="usernav">
		<li style="padding-top: 3px;width:92px;">
			<a href="<?php echo bp_loggedin_user_domain() ?>" style="font-family: damion; color:#B5DE24; font-size: 16px; padding-top: 3px; font-weight: 100;"><?php echo $user->display_name . "\n"; ?></a>
			<ul>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>achievements">Achievements</a>
					<ul style="left: 146px;">
						<li><a href="<?php echo bp_loggedin_user_domain() ?>achievements">My Achievements</a></li>
					</ul>
				</li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>groups">Groups</a>
					<ul style="left: 146px;">
						<li><a href="<?php echo bp_loggedin_user_domain() ?>groups/invites">Invites</a></li>
						<li><a href="<?php echo bp_loggedin_user_domain() ?>groups/my-groups">My Groups</a></li>
					</ul>
				</li>
				
				<li><a href="">Links</a>
					<ul style="left: 146px;">
						<li><a href="">My Links</a></li>
					</ul>
				</li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>messages">Messages</a>
					<ul style="left: 146px;">
						<li><a href="<?php echo bp_loggedin_user_domain() ?>compose">Compose</a></li>
						<li><a href="<?php echo bp_loggedin_user_domain() ?>inbox">Inbox</a></li>
						<li><a href="<?php echo bp_loggedin_user_domain() ?>notices">Notices</a></li>
						<li><a href="<?php echo bp_loggedin_user_domain() ?>sentbox">Sent messages</a></li>
					</ul>
				</li>
				<li><a href="">Settings</a>
					<ul style="left: 146px;">
						<li><a href="">Add Avatar</a></li>
						<li><a href="">Edit Profile</a></li>
						<li><a href="">General</a></li>
						<li><a href="">Notices</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="<?php echo bp_loggedin_user_domain() ?>activity">Activity</a>
			<ul>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/favourites">Favourites</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/friends">Friends</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/groups">Groups</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/links">Links</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/just-me">Personal</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/mentions">@<?php echo $user->user_login; ?> mentions</a></li>
			</ul>
		</li>
		<li><a href="<?php echo bp_loggedin_user_domain() ?>members">Community</a>
			<ul>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/">Activity</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/achievements">Achievements</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/groups">Groups</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/links">Links</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>activity/members">Members</a></li>
			</ul>
		</li>
		<li><a href="<?php echo bp_loggedin_user_domain() ?>friends">Friends</a>
			<ul>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>friends/my-friends">My friends</a></li>
				<li><a href="<?php echo bp_loggedin_user_domain() ?>friends/requests">Requests</a></li>
			</ul>
		</li>

		<?php if( function_exists('my_bp_adminbar_notifications_menu') ) my_bp_adminbar_notifications_menu(); ?>
		<li>
			<a href="<?php echo get_bloginfo("url"); ?>/wp-admin/">Dashboard</a>
		</li>

		
		</ul>
		
		<?php
	} else {
?>
<ul id="usernav">
	<li><a href="javascript:void(0);" onclick="openLoginPopup()" >Login</a></li>
	<li><a href="javascript:void(0);" onclick="openRegisterPopup()" >Register</a></li>
<?php
	}
?>
					</ul>
					<ul id="usernav" style="float:right; width: 214px; margin-left:0;">
						<lI style="float: left;">
							<a href="javascript:void(0);" onclick="openNewactivity()" style="color:#B5DE24;">New Activity</a>
						</LI>
		
						<li style="padding-right:0;margin-right:0; float: right;"><a style="padding-right:0;" id="logout" href="<?php echo wp_logout_url( get_option('home') ) ?>"><?php _e( 'Log Out', 'buddypress' ) ?></a></li>
					</ul>