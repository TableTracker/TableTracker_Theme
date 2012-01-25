<?php 
/**
 * AdvertisementWidget Class
 */
class AdvertisementWidget extends WP_Widget {
    
    function AdvertisementWidget() {
        parent::WP_Widget(false, $name = 'Advertisement');
    }

    
    function widget($args, $instance) {
        extract( $args );
		
        ?>
	<div style="width: 225px; float:right;">
		<img src="http://dummyimage.com/225x130/fff/000&text=Advertisement" style="width: 225px; height: 150px;">	
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
add_action('widgets_init', create_function('', 'return register_widget("AdvertisementWidget");'));
?>