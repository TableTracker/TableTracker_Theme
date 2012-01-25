<?php

global $tt_options;
	
	$tt_optionsSocialSectionArray = array("type" => "open");	
	
	$tt_options = array( 
	
	array(
		"name" => "Social Networks",
		"type" => "section"),
	
	array(
		"name" => "Set up your social networks",
		"type" => "section-desc"),
	
	array("type" => "open"),
			
		array(
			"name" => "Connect settings",
			"type" => "section"),
	
		array(
			"name" => "",
			"type" => "section-desc"),
	
		array("type" => "open"),
			
			array(
				"type" => "obs",
				"name" => "!!OBS!!",
				"text" => "This section sets up the behavior for the social media icons that are displayed next to \"Connect\""
			),
			
			array(
				"type" 	=> "radio",
				"id" 	=> "tt_icon_popup",
				"options" => array("Pop up player. Opens a window where the content stream from your social medias is displayed.", "Link. Buttons will open a new tab to your social media channel(s)."),
				"name" 	=> "Behavior of social icons.",
				"std" 	=> "0"
			),
			
		array("type" => "close"),
		
		array(
			"name" => "Networks",
			"type" => "section"),
	
		array(
			"name" => "Heres where you add your social networks.",
			"type" => "section-desc"),
	
		array("type" => "open"),
		
			array(
				"name" => "Twitter",
				"desc" => "Enter your Twitter username here.",
				"id" => "tt_twitterid",
				"type" => "text",
				"std" => "",
			),
			
			array(
				"name" => "Facebook",
				"desc" => "Enter your Facebook access token here<br>Get it <a href='https://www.facebook.com/dialog/oauth?client_id=112035682224154&redirect_uri=http://tabletracker.me/&scope=read_stream,offline_access,manage_pages&response_type=token' target='_blank'>here</a>.",
				"id" => "tt_facebookid",
				"type" => "text",
				"std" => "",
			),
		
			array(
				"name" => "Linkedin",
				"desc" => "Enter your Linkedin public profile URL. (Found on under your linkedin profile)",
				"id" => "tt_linkedinid",
				"type" => "linkedin",
				"std" => "",
			),
		
			array(
				"name" => "Instagram",
				"desc" => "Enter your Instagram username here.",
				"id" => "tt_instagramid",
				"type" => "text",
				"std" => "",
			),
		
			array(
				"name" => "Flickr",
				"desc" => "Enter your Flickr username here.",
				"id" => "tt_flickrid",
				"type" => "text",
				"std" => "",
			),
		
			array(
				"name" => "Youtube",
				"desc" => "Enter your Youtube username here.",
				"id" => "tt_youtubeid",
				"type" => "text",
				"std" => "",
			),
		
		array("type" => "close"),
		
		array(
			"name" => "Contact",
			"type" => "section"),
	
		array(
			"name" => "Set up your contact information.",
			"type" => "section-desc"),
	
		array("type" => "open"),
		
			array(
				"type" => "obs",
				"name" => "!!OBS!!",
				"text" => "Only enter the information that you want publicly displayed. The information only displays in the contact form that pop ups when the user send you a message or in the social media contact pop-up window, if you have selected one."
			),
			
			array(
				"name" => "Mail",
				"desc" => "Enter your Mail address here.",
				"id" => "tt_mailid",
				"type" => "text",
				"std" => "",
			),
			
			array(
				"name" => "Phone",
				"id" => "tt_phone",
				"type" => "text",
				"desc" => "Enter your Phone here."		
			),
	
			array(
				"name" => "Website",
				"id" => "tt_website",
				"type" => "text",
				"desc" => "Enter your Website here."		
			),
			
			array("type" => "skypebox-open"),
			
			array(
				"name" => "Skype username",
				"desc" => "Enter your Skype username here.",
				"id" => "tt_skypeid",
				"type" => "skypetext",
				"std" => "",
			),
		
			array(
				"name" => "Skype action",
				"desc" => "Define the action of your skype link!",
				"id" => "tt_skypeaction",
				"type" => "skyperadio",
				"options" => array("Call", "Chat", "Add", "None"),
				"std" => "3",
			),
			
			array("type" => "skypebox-close"),
		
		array("type" => "close"),
	
		
	
	array("type" => "close"));


?>