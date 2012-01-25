<?php 
/**
 * FeedWidget Class
 */
class FeedWidget extends WP_Widget {
    
    function FeedWidget() {
        parent::WP_Widget(false, $name = 'Feed Widget');
    }

    
    function widget($args, $instance) {
        extract( $args );
		$number = apply_filters('widget_number', $instance['number']);
		
        ?>
		<script type="text/javascript" charset="utf-8">
			$(window).load(function(){
				$("#feedwidgetScrolldown").click(function(){
					contentDown = feedWidgetContentHeight - feedWidgetVisibleHeight - $("#feedWidgetInner").scrollTop();
					if(contentDown > feedWidgetVisibleHeight){
						$("#feedWidgetInner").animate({scrollTop: $("#feedWidgetInner").scrollTop() + feedWidgetVisibleHeight }, "fast");
					}else{
						$("#feedWidgetInner").animate({scrollTop: $("#feedWidgetInner").scrollTop() + contentDown }, "fast");
						$(this).css("visibility","hidden");
					}
					$("#feedwidgetScrollup").css("visibility","visible");
					return false;
				});
				
				$("#feedwidgetScrollup").click(function(){
					contentUp = $("#feedWidgetInner").scrollTop();
					if(contentUp > feedWidgetVisibleHeight){
						$("#feedWidgetInner").animate({scrollTop: $("#feedWidgetInner").scrollTop() - feedWidgetVisibleHeight }, "fast");
					}else{
						$("#feedWidgetInner").animate({scrollTop: $("#feedWidgetInner").scrollTop() - contentUp }, "fast");
						$(this).css("visibility","hidden");
					}
					$("#feedwidgetScrolldown").css("visibility","visible");
					return false;
				});
				
				
				feedWidgetHeight = $("#feedWidget").height();
				feedWidgetVisibleHeight = $("#feedWidgetInner").height();
				feedWidgetContentHeight = $("#feedWidgetContent").height();
				
				if(feedWidgetContentHeight > feedWidgetVisibleHeight){
					$("#feedwidgetScrolldown").css("visibility","visible");
				}
			});
		</script>
		<div id="feedWidget" class="widget purple" <?php if(!is_home()){ ?>style="height: 100%;"<?php } ?>>
				<h2>Our Team's Feeds</h2>
				<div id="feedWidgetInner">
				<div id="feedWidgetContent">
					<?php
					$usernames = "tabletracker ed_celis"; 
					$limit = $number;
					$show = 1; // Show username? 0 = No, 1 = Yes. 
					$prefix = "<ul>"; 
					$prefix_sub = "<li>"; 
					$wedge = "<br />"; 
					$suffix_sub = "</li>"; 
					$suffix = "</ul>";

					function parse_feed($usernames, $limit, $show, $prefix_sub, $wedge, $suffix_sub) {
					$usernames = str_replace(" ", "+OR+from%3A", $usernames); 
					$feed = "http://search.twitter.com/search.atom?q=from%3A" . $usernames . "&rpp=" . $limit; 
					$feed = file_get_contents($feed); 
					$feed = str_replace("&", "&", $feed); 
					$feed = str_replace("<", "<", $feed); 
					$feed = str_replace(">", ">", $feed);
					$feed = str_replace("&lt;", "<", $feed); 
					$feed = str_replace("&gt;", ">", $feed); 
					$clean = explode("<entry>", $feed); 
					$amount = count($clean) - 1;

					for ($i = 1; $i <= $amount; $i++) {

					$entry_close = explode("</entry>", $clean[$i]); 
					$clean_content_1 = explode("<content type=\"html\">", $entry_close[0]); 
					$clean_content = explode("</content>", $clean_content_1[1]); 
					$clean_name_2 = explode("<name>", $entry_close[0]); 
					$clean_name_1 = explode("(", $clean_name_2[1]); 
					$clean_name = explode(")</name>", $clean_name_1[1]); 
					$clean_uri_1 = explode("<uri>", $entry_close[0]); 
					$clean_uri = explode("</uri>", $clean_uri_1[1]);

					// GET AVATAR
					$avatar_2 = explode("type=\"image/png\" href=\"", $clean[$i]);
					$avatar_1 = explode("\" rel=\"image\"", $avatar_2[1]);
					$avatar = "<img src=\"".$avatar_1[0]."\" class=\"avatarimg\" />"; 


					echo $prefix_sub; 
					if ($show == 1) { echo "<a class=\"avatarimg\" href=\"" . $clean_uri[0] . "\">" . $avatar . "</a> <a class=\"name\" href=\"" . $clean_uri[0] . "\">" . $clean_name[0] . "</a>" . $wedge; } 
					echo $clean_content[0]; 
					echo $suffix_sub;

					}

					}
					echo $prefix; 
					parse_feed($usernames, $limit, $show, $prefix_sub, $wedge, $suffix_sub); 
					echo $suffix;
					?>
					
				</div>
				</div>
				<a href="#" id="feedwidgetScrolldown">▼</a>
				<a href="#" id="feedwidgetScrollup">▲</a>
			</div>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['number'] = strip_tags($new_instance['number']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {        
	$number = esc_attr($instance['number']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('number:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
        <?php
    }

} // class FeedWidget
add_action('widgets_init', create_function('', 'return register_widget("FeedWidget");'));
?>
