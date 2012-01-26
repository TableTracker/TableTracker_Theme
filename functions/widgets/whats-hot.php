<?php 
/**
 * WhatsHotWidget Class
 */
class WhatsHotWidget extends WP_Widget {
    
    function WhatsHotWidget() {
        parent::WP_Widget(false, $name = 'What\'s Hot');
    }

    
    function widget($args, $instance) {
        extract( $args );
		
        ?>
		<div id="whatsHotWidget" class="widget red">
			<h2>What's hot in TableTracker</h2>
			<div class="whats-hot-item" style="width: 80px; float: left; margin-right: 15px;">
				<div class="image">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/hot1.png" />
				</div>
				
				<div class="text" style="margin:10px 0 5px;">
					Traditional Japanese sushi recipes and off the wall crazy sushi combos!<br />
					<a href="#">Read more ...</a>
				</div>
			</div>
			<div class="whats-hot-item" style="width: 80px; float: left; margin-right: 15px;">
				<div class="image">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/hot2.png" />
				</div>
				
				<div class="text" style="margin:10px 0 5px;">
					Cilantro Pesto Seafood Cocktail uses mixed seafood instead of just shrimp.<br />
					<a href="#">Read more ...</a>
				</div>
			</div>
			<div class="whats-hot-item" style="width: 80px; float: left;">
				<div class="image">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/hot3.png" />
				</div>
				
				<div class="text" style="margin:10px 0 5px;">
					A flan is a tart, with a base of shortcrust pastry. An example is a quiche. <br />
					<a href="#">Read more ...</a>
				</div>
			</div>
			<div class="clear"></div>		
		</div>

		<?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {        
    }

} // class FeedWidget
add_action('widgets_init', create_function('', 'return register_widget("WhatsHotWidget");'));
?>
