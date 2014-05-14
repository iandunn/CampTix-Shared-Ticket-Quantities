<p>If you want group this ticket with other tickets and assign a shared quantity to all of them, fill out these values:</p>

<h4>Grouped Tickets</h4>

<?php if ( $tickets ) : ?>
	
	<ul>
		<?php foreach ( $tickets as $ticket ) : ?>
			<?php if ( $ticket->ID == $GLOBALS['post']->ID ) continue; ?>
			
			<li>
				<input type="checkbox" id="cstq_shared_ticket_<?php echo esc_attr( $ticket->ID ); ?>" name="cstq_shared_tickets[]" value="<?php echo esc_attr( $ticket->ID ); ?>" <?php checked( 1, 1 ); // todo ?> />
				
				<label for="cstq_shared_ticket_<?php echo esc_attr( $ticket->ID ); ?>">
					<?php echo esc_html( get_the_title( $ticket->ID ) ); ?>
				</label>
			</li>
		<?php endforeach; ?>
	</ul>
	
<?php else : ?>

	<p>No other tickets have been created yet.</p>
	
<?php endif; ?>


<h4>Shared Quantity</h4>
<input id="cstq_shared_quantity" name="cstq_shared_quantity" type="text" class="small-text" value="<?php echo esc_attr( $shared_quantity ); ?>" />
