<?php 
/**
 * MapWidget Class
 */
class MapWidget extends WP_Widget {
    
    function MapWidget() {
        parent::WP_Widget(false, $name = 'Map');
    }

    
    function widget($args, $instance) {
        extract( $args );
		
        ?>
        
        <!-- Memolane style -->
		<style>
		<!--
			a#expand-memolane{
				display: block;
				position: absolute;
				z-index: 20;
				top: 185px;
				left: 350px;	
			}
			
			div#huge_memolane{
				width: 100%;
				height: 849px;
				z-index: -100;
								
				display: block;
				position: absolute;
				top: 130px;
				left: 0px;
			}
			
			#content{
				z-index: 40;	
			}
		-->
		</style>
		
		<!-- Memolane script -->
		
		<!-- Memolane map -->
		<div id="huge_memolane"></div>
		<div id="mapWidget">
			<div style="height: 231px;">
				<iframe src="http://tabletracker.com/alpha/#map_canvas" frameborder="0" width="370" height="231" scrolling="no"></iframe>
				<a id="expand-memolane" href=""><img alt="memolane" src="http://cdn1.iconfinder.com/data/icons/fatcow/16x16_0060/arrow_out.png" /></a>
			</div>
		</div>	
		
		<script type="text/javascript">
			$("#huge_memolane").appendTo("#header");
				
			$('#expand-memolane').click(function(event) {
				event.preventDefault();
				
			});

			$('#expand-memolane').toggle(function(){

				$("#mapWidget div iframe").appendTo("#huge_memolane");
				$("#expand-memolane").appendTo("#huge_memolane");
				$('#huge_memolane').css({ zIndex: 200 });
				$("#huge_memolane iframe").css({
					height: '849px',
					width: '100%'
					});	
			},
			function(){
				
					$("#huge_memolane iframe").appendTo("#mapWidget div");
					$("#expand-memolane").appendTo("##mapWidget div");
					$('#huge_memolane').css({ zIndex: -100 });
					$("#mapWidget div iframe").css({
						height: '222px',
						width: '370px'
					});
				});
		</script>
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
add_action('widgets_init', create_function('', 'return register_widget("MapWidget");'));
?>
