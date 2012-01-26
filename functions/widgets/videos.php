<?php 
/**
 * VideosWidget Class
 */
class VideosWidget extends WP_Widget {
    
    function VideosWidget() {
        parent::WP_Widget(false, $name = 'Videos');
    }

    
    function widget($args, $instance) {
        extract( $args );
		
        ?>
		<style type="text/css" media="screen">
			#videocontainer{
				width: 280px;
				height: 160px;
				float: left;
			}
			#player{
				position: relative;
			}
			.playertofull, .playertonormal{
				position: absolute;
				top: 5px;
				right: 5px;
				color: red;
				z-index: 999999;
				display: block;
				width: 16px;
				height: 16px;
				background: url(<?PHP bloginfo( 'template_url' ) ?>/images/arrow_out);
				overflow: hidden;
				text-indent: -200px;
			}
			.playertonormal{
				display: none;
				background: url(<?PHP bloginfo( 'template_url' ) ?>/images/arrow_in);
			}
		</style>
	<script type="text/javascript" src="<?PHP bloginfo( 'template_url' ) ?>/js/flowplayer-3.2.6.min.js"></script>
	<script type="text/javascript" src="<?PHP bloginfo( 'template_url' ) ?>/js/flowplayer.controls-3.0.2.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(window).load(function(){
			videoHeight = $("#content").height();
			$("#player").append("<a href='#' class='playertofull'>X</a><a href='#' class='playertonormal'>X</a>");
			$(".playertofull").click(function(){
				$("#player").appendTo("body");
				$("#player").css("position","absolute");
				$("#player").css("z-index","99999");
				$("#player").css("top","130px");
				$("#player").css("left","0");
				$("#player").css("width","100%");
				$("#player").css("height",videoHeight+55+"px");
				$(this).css("display","none");
				$(".playertonormal").css("display","block");
			});
			$(".playertonormal").click(function(){
				$("#player").appendTo("#videocontainer");
				$("#player").css("position","relative");
				$("#player").css("width","280px");
				$("#player").css("height","160px");
				$("#player").css("top","0");
				$("#player").css("left","0");
				$(this).css("display","none");
				$(".playertofull").css("display","block");
			});
		});
	</script>
	
	<div class="widget blue" id="featuredVideosWidget">
		<h2>Featured Videos</h2>
		<span id="video-emb" style="float:left;"></span>
		
		<div id="videocontainer"><a href="<?PHP bloginfo( 'template_url' ) ?>/video/melee.mp4" style="display:block;width:280px;height:160px" id="player"></a></div>
		
		<script>
			$f("player", { src: "<?PHP bloginfo( 'template_url' ) ?>/js/flowplayer-3.2.7.swf", wmode: "opaque" }, { clip: { scaling: 'fit', autoPlay: false }, plugins: {controls: { fullscreen: false }} });
		</script>
			
		<ul class="right" id="OtherFeatured">
			<li>
				<img src="<?PHP bloginfo( 'template_url' ) ?>/images/vid1.png">
				How to make Sushi
				<a href="//javascript:loadVideo1()">Watch here</a>
			</li>
			<li>
				<img src="<?PHP bloginfo( 'template_url' ) ?>/images/vid2.png">
				How to cut Fish
				<a href="//javascript:loadVideo2()">Watch here</a>
			</li>
			<li>
				<img src="<?PHP bloginfo( 'template_url' ) ?>/images/vid3.png">
				How to prepare Duck
				<a href="//javascript:loadVideo3()">Watch here</a>
			</li>
		</ul>
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
add_action('widgets_init', create_function('', 'return register_widget("VideosWidget");'));
?>
