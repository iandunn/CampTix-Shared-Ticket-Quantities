<?php
	
	if ( ! class_exists( 'CampTix_Shared_Ticket_Quantities' ) ) {
	class CampTix_Shared_Ticket_Quantities extends CampTix_Addon {
		
		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'admin_init', array( $this, 'add_meta_boxes' ) );
			
			add_filter( 'camptix_default_options', array( $this, 'register_default_options' ) );
		}
	
		/**
		 * Register our defaults options with CampTix
		 * 
		 * @param  array $options
		 * @return mixed
		 */
		public function register_default_options( $options ) {
			$options['cstq'] = array(
				array(
					'tickets'  => array( 30, 1697 ),
					'quantity' => '10',
				),	// todo data stub
			);
				
			return $options;
		}
	
		/**
		 * Registers meta boxes
		 */
		public function add_meta_boxes() {
			add_meta_box(
				'cstq_shared_quantities',
				'Shared Quantities',
				array( $this, 'markup_meta_boxes' ),
				'tix_ticket',
				'side',
				'low'
			);
		}
	
		/**
		 * Renders the markup for meta boxes
		 *
		 * @param object $post
		 * @param array  $box
		 */
		public function markup_meta_boxes( $post, $box ) {
			$camptix_options = $GLOBALS['camptix']->get_options();
			$view = dirname( __DIR__ ) . '/views/';
			
			switch ( $box['id'] ) {
				case 'cstq_shared_quantities':
					$tickets = get_posts( array( 'post_type' => 'tix_ticket' ) ); //todo, include drafted
					$shared_quantity = $camptix_options['cstq'][0]['quantity']; // todo
					$view .= 'metabox-shared-quantities.php';
				break;
			}
	
			if ( is_file( $view ) ) {
				require_once( $view );
			}
		}
	
	} // end CampTix_Shared_Ticket_Quantities
}
