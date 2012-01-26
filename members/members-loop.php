<?php /* Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter() */ ?>

<?php do_action( 'bp_before_members_loop' ) ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<?php do_action( 'bp_before_directory_members_list' ) ?>

	<ul id="members-list" class="item-list">
	<?php while ( bp_members() ) : bp_the_member(); ?>

		<li style="list-style: none; margin:10px; float: left;"> 
		<div class="friendcard">
			<div class="item-avatar">
				<a href="<?php bp_member_permalink() ?>"><?php bp_member_avatar() ?></a>
			</div>
		<div class="hovercard" style="margin-left: 51px; background: #579EDD; box-sizing: border-box; padding: 7px; position: absolute; border-right: 1px solid #fff; border-bottom: 1px solid white; border-top: 1px solid white; border-left: 1px solid white; 
-webkit-box-shadow: 0 0 10px #ffffff, inset 0 0 10px #000000;
-moz-box-shadow: 0 0 10px #ffffff, inset 0 0 10px #000000;
box-shadow: 0 0 10px #fcf7c0, inset 0 -5px -5px #000000;">
				<div id="item-header-content">

		<h2 style=" " class="fn"><a href="<?php bp_member_permalink() ?>"><span class="username" style="color: white;"><?php bp_member_name() ?></span></a></h2>
	
		<span class="activity" style="top: 300px; "><p style=" color: white; font-size:14px; font-family: Arial; "><?php bp_member_last_active() ?>&nbsp;&nbsp;&nbsp;</p></span>

			</div>
		</div>
		</div>

	<?php endwhile; ?>
	</ul>
	<?php do_action( 'bp_after_directory_members_list' ) ?>

	<?php bp_member_hidden_fields() ?>

<?php else: ?>
	<div>
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ) ?></p>
	</div>
<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ) ?>
