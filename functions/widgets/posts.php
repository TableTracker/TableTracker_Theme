<?php 
/**
 * PostsWidget Class
 */
class PostsWidget extends WP_Widget {
    
    function PostsWidget() {
        parent::WP_Widget(false, $name = 'Posts');
    }

    
    function widget($args, $instance) {
        extract( $args );
		
        ?>
	
	<div id="postsWidget">
		<div class="post featured">
			<div class="postheader">
				<img class="image" src="<?PHP bloginfo( 'template_url' ) ?>/images/head1.png">
				<h3>Featured Posts</h3>
				<h2>7 Things You Should Know About Finding a Perfect Restaurant.</h2>
				<p class="author">
					<strong>Coco Potter</strong>, Food Critic, The Paris Examiner.
	 				<!-- span class="date">05-19-2011</span -->
				</p>
			</div>
			<blockquote>
				<p>Whether you are traveling alone on business or with some friends or family for pleasure, chances are the meal is a very important part of the trip. There is nothing better than a trusted relative, friend or colleague who can steer you to the right place or steer you clear of a disastrous breakfast, lunch, or dinner, waiting to happen.</p>
			</blockquote>
			<p class="more">
				<a href="#"><strong>Read Post</strong></a> |
				<a href="#">523 Comments</a>
			</p>
		</div>
			
		<div class="post guide">
			<div class="postheader">
				<img class="image" src="<?PHP bloginfo( 'template_url' ) ?>/images/head2.png">
				<h3>Reviews</h3>
				<h2>Online Information</h2>
				<p class="author">
					<strong>Paul Chen</strong>
				</p>
			</div>
			<blockquote>
				<p>Pretty much every single restaurant is online now with many user reviews of the location. Check out popular sites.</p>
			</blockquote>
			<p class="more">
				<a href="#"><strong>Read Post</strong></a> |
				<a href="#">5 Comments</a>
			</p>
		</div>
		
		<div class="post review">
			<div class="postheader">
				<img class="image" src="<?PHP bloginfo( 'template_url' ) ?>/images/head3.png">
				<h3>Guides</h3>
				<h2>Use Your Nose!</h2>
				<p class="author">
					<strong>Peter Gabe</strong>
				</p>
			</div>
			<blockquote>
				<p>Sometimes window shopping for a restaurant isn’t enough. So take a quick peak inside and breathe in deeply hungry traveler.</p>
			</blockquote>
			<p class="more">
				<a href="#"><strong>Read Post</strong></a> |
				<a href="#">8 Comments</a>
			</p>
		</div>
		
		
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
add_action('widgets_init', create_function('', 'return register_widget("PostsWidget");'));
?>
