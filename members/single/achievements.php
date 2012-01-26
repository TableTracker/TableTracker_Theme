<?php get_header() ?>
<div id="content" style="float:left; width: 690px; height:420px;">
<div class="big-box green">
	<div id="item-header">
		<?php locate_template( array( 'members/single/member-header.php' ), true ) ?>
	</div>
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
		<?php if ( dpa_is_member_my_achievements_page() ) : ?>
			<div class="achievements" style="
			width: 450px;
			float: left;
			overflow: hidden;
			height: 325px;">
			<?php dpa_load_template( array( 'members/single/achievements/unlocked.php' ) ); ?>
			</div><div id="scrolls" style="width: 20px; float: right; color: #579EDD; font-size: 14px;"></div>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php locate_template( array( 'members/single/sidebar.php' ), true ) ?>
<div style="width: 935px; float:left;">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Members Bottom') ) : ?>
<?php endif; ?>
</div>
<div class="clear">&nbsp;</div>
<?php get_footer() ?>





