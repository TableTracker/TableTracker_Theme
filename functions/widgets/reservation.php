<?php 
/**
 * ReservationWidget Class
 */
class ReservationWidget extends WP_Widget {
    
    function ReservationWidget() {
        parent::WP_Widget(false, $name = 'Reservation');
    }

    
    function widget($args, $instance) {
        extract( $args );
		
        ?>
	<link rel="stylesheet" href="<?PHP bloginfo( 'template_url' ) ?>/styles/overcast/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<script type="text/javascript">
		$(function(){
			$("#datepick").datepicker();
		});
	</script>
	<div class="aboveWMark">
		<div class="widget green" id="reservationWidget">
		<h2>MAKE A RESTAURANT RESERVATION (IT’S FREE!)</h2>
			<form method="post">
			<table border="0">
				<tr>
					<td><label>By Neighbourhood</label>
						<select>
							<option>Alamo Square</option>
						</select>
					</td>
					<td><label>By Cuisine</label>
						<select>
							<option>All Cuisine</option>
						</select>
					</td>
					<td><label>Restaurant Name</label>
						<input type="text" value="Restaurent name">
					</td>
				</tr>
				<tr>
					<td><label>Prize</label>
						<select>
							<option>Any Price</option>
						</select>
					</td>
					<td colspan="2"><label>Party Size</label>
						<select>
							<option>2 people</option>
						</select>
					</td>							
				</tr>
				<tr>
					<td>
						<label>Date</label>
						<input type="text" value="" id="datepick">
					</td>
					<td><label>Time</label>
						<select>
							<option>12:00 PM</option>
						</select>
					</td>
					<td style="vertical-align: bottom;">
						<img src="<?php echo bloginfo( 'template_url' ) ?>/images/findatable_button.png">
					</td>
				</tr>
			</table>
			</form>
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
add_action('widgets_init', create_function('', 'return register_widget("ReservationWidget");'));
?>