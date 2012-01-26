<?php
	global $options;
	$options = get_option('ttracker_options');
	
	$templatedir = get_template_directory();
	
	/* Require Theme Options */
	require_once ( get_template_directory() . '/functions/themeoptions/theme-options.php' );
	
	/* Widgets */
	
	if ($handle = opendir($templatedir . '/functions/widgets/')) {

   		while (false !== ($file = readdir($handle))) {
   			if($file == "."){
   			}elseif($file == ".."){
   			}else{
   		    require_once($templatedir . '/functions/widgets/' . $file);
   		    }
    	}
    	closedir($handle);
	}
	/* Sidebars */
	
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Homepage Left',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Homepage Right',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Homepage Right - Left',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Homepage Right - Right',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Homepage Bottom',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Members Sidebar',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Members Bottom',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
		
	
	define('BP_NEW_ACTIVITY_SLUG', 'members/olufnielsen/activity/new');
	function bp_show_example_page() {
		global $bp, $current_blog;

		if ( $bp->current_component == BP_NEW_ACTIVITY_SLUG && $bp->current_action == '' ) {
			// The first variable here must match the name of your template file below
			bp_core_load_template( 'members/index', true );
		}
	}
	
	add_action( 'wp', 'bp_show_example_page', 2 );
	
	// Member Buttons
	remove_action( 'bp_member_header_actions', 'bp_add_friend_button' );
	remove_action( 'bp_member_header_actions', 'bp_send_public_message_button' );
	remove_action( 'bp_member_header_actions', 'bp_send_private_message_button' );
	if ( bp_is_active( 'friends' ) )
		add_action( 'bp_member_header_actions',    'bp_add_friend_button',20 );

	if ( bp_is_active( 'activity' ) )
		add_action( 'bp_member_header_actions',    'bp_send_public_message_button',15 );

?>

