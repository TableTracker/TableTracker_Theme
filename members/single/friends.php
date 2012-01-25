<?php if ( 'requests' == bp_current_action() ) : ?>
	<?php locate_template( array( 'members/single/friends/requests.php' ), true ) ?>

<?php else : ?>

	<?php do_action( 'bp_before_member_friends_content' ) ?>

	<div class="members friends" style="
width: 490px;
float: right;
overflow: auto;
height: 325px;
margin-top: -20px;>
		<?php locate_template( array( 'members/members-loop.php' ), true ) ?>
	</div><!-- .members.friends -->

	<?php do_action( 'bp_after_member_friends_content' ) ?>

<?php endif; ?>
