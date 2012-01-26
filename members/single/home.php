<?php get_header() ?>
<div id="content" style="float:left; width: 690px; height:420px;">
	<div class="big-box green">
		<?php do_action( 'bp_before_member_home_content' ) ?>
		<div id="item-header">
			<?php locate_template( array( 'members/single/member-header.php' ), true ) ?>
		</div><!-- #item-header -->
		<div id="item-body">
		<div id="item-nav">
			<div class="item-list-tabs no-ajax" id="object-nav">
				<ul>
					<?php bp_get_displayed_user_nav() ?>
					<?php do_action( 'bp_member_options_nav' ) ?>
				</ul>
			</div>
			<script type="text/javascript" charset="utf-8">
				$("#activity-personal-li").appendTo("#object-nav ul");
				$("#friends-personal-li").appendTo("#object-nav ul");
				$("#groups-personal-li").appendTo("#object-nav ul");
				$("#messages-personal-li").appendTo("#object-nav ul");
				$("#profile-personal-li").appendTo("#object-nav ul");
				$("#settings-personal-li").appendTo("#object-nav ul");
			</script>
			<?php do_action( 'bp_before_member_body' ) ?>
		</div>
		<?php if ( bp_is_user_activity() || !bp_current_component() ) : ?>
			<?php locate_template( array( 'members/single/activity.php' ), true ) ?>

			<?php elseif ( bp_is_user_blogs() ) : ?>
				<?php locate_template( array( 'members/single/blogs.php' ), true ) ?>

			<?php elseif ( bp_is_user_friends() ) : ?>
				<?php locate_template( array( 'members/single/friends.php' ), true ) ?>

			<?php elseif ( bp_is_user_groups() ) : ?>
				<?php locate_template( array( 'members/single/groups.php' ), true ) ?>

			<?php elseif ( bp_is_user_messages() ) : ?>
				<?php locate_template( array( 'members/single/messages.php' ), true ) ?>

			<?php elseif ( bp_is_user_profile() ) : ?>
				<?php locate_template( array( 'members/single/profile.php' ), true ) ?>
				

			<?php else : ?>
				<?php
					/* If nothing sticks, just load a member front template if one exists. */
					locate_template( array( 'members/single/front.php' ), true );
				?>
			<?php endif; ?>

			<?php do_action( 'bp_after_member_body' ) ?>

			<div class="clear"></div>
		</div><!-- #item-body -->
		<?php do_action( 'bp_after_member_home_content' ) ?>
		<div class="clear"></div>
</div>
</div><!-- #content -->

	<?php locate_template( array( 'members/single/sidebar.php' ), true ) ?>
<div style="width: 935px; float:left;">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Members Bottom') ) : ?>
<?php endif; ?>
</div>
<div class="clear">&nbsp;</div>
<?php get_footer() ?>