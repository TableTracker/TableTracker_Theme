<?php global $options; ?>
				<div class="info">
				<h3><?php echo $options['tt_firstname'] . " " . $options['tt_lastname']; ?></h3>
				<?php if ( $options['tt_website'] != "" ) { ?>
					<b>Website:</b> <a href="<?php echo $options['tt_website']; ?>"><?php echo $options['tt_website']; ?></a>
				<?php } ?>
				<?php if ( $options['tt_phone'] != "" ) { ?>
					<b>Phone:</b> <?php echo $options['tt_phone']; ?>
				<?php } ?>
				<?php
				
					if ( $options['tt_skypeid' ] != "" ) {
						echo "<b>Skype:</b> <a href='skype:" . $options['tt_skypeid'];
						if ( $options['tt_skypeaction' ] == 0 ){
							echo "?call";
						} elseif ( $options['tt_skypeaction' ] == 1 ) {
							echo "?chat";
						} elseif ( $options['tt_skypeaction' ] == 2 ) {
							echo "?add";
						}
						echo "'>" . $options['tt_skypeid'] ."</a>";
					}
				
				?>
				</div>
				<div class="hr"></div>