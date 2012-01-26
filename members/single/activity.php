<?php do_action( 'bp_before_member_activity_post_form' ) ?>

<?php do_action( 'bp_after_member_activity_post_form' ) ?>
<?php do_action( 'bp_before_member_activity_content' ) ?>

<div class="activity" style="
width: 450px;
float: left;
overflow: hidden;
height: 325px;">
		<?php locate_template( array( 'activity/activity-loop.php' ), true ) ?>
</div><!-- .activity -->

<div id="scrolls" style="width: 20px; float: right; color: #579EDD; font-size: 14px;"></div>
	

<?php do_action( 'bp_after_member_activity_content' ) ?>
