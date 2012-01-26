<?php do_action( 'bp_before_member_header' ) ?>

<!-- #item-header-avatar -->
<div id="item-header-avatar">
	<a href="<?php bp_user_link() ?>">
		<?php bp_displayed_user_avatar( 'type=full&height=58&width=58&class=userimage' ) ?>
	</a>
</div>

<!-- #item-buttons -->
<div id="item-buttons" class="profile-actions">
	<?php do_action( 'bp_member_header_actions' ); ?>
	<?php if ( is_user_logged_in() && !bp_is_my_profile() ) : ?>
		<a href="#" id="sendmessage-button">Send message</a>
	<?php endif; ?> 
</div>		

<!-- #item-header-content -->	
<div id="item-header-content">
	<h2 class="fn">
		<a href="<?php bp_displayed_user_link() ?>"><?php bp_displayed_user_fullname() ?></a>
	</h2>
	<span class="activity">
		<p><?php bp_last_activity( bp_displayed_user_id() ) ?></p>
	</span>
	
	<!-- #item-meta -->
	<?php do_action( 'bp_before_member_header_meta' ) ?>
	<div id="item-meta">
		<?php if ( function_exists( 'bp_activity_latest_update' ) ) : ?>
			<div id="latest-update">
				<?php bp_activity_latest_update( bp_displayed_user_id() ) ?>	
				<?php if ( is_user_logged_in() && bp_is_my_profile() ) : ?>
					<a href="javascript:void(0);" onclick="openNewactivity()" class="bluelink">New activity</a>
				<?php endif; ?> 
			</div>
		<?php endif; ?>
		<?php
		 /***
		  * If you'd like to show specific profile fields here use:
		  * bp_profile_field_data( 'field=About Me' ); -- Pass the name of the field
		  */
		?>
		<?php do_action( 'bp_profile_header_meta' ) ?>
	</div>
</div>
<?php do_action( 'bp_after_member_header' ) ?>
<?php do_action( 'template_notices' ) ?>