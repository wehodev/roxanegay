<?php
/**
 * Flickr Widget Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class Adamas_Widget_Flickr extends WP_Widget {

	/**
	 * Register widget with WordPress
	 *
	 * @since Adamas 1.0
	 */
	function __construct() {
		parent::__construct(
			'adamas_flickr',
			esc_html__( 'Adamas Flickr', 'adamas' ),
			array( 'description' => esc_html__( 'Displays your latest flickr photos.', 'adamas' ) )
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls
	 *
	 * @since Adamas 1.0
	 */
	function widget( $args, $instance ) {

		// Extract widget variables
		extract( $args );

		// Declare variables
		$title     = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$username  = strip_tags( $instance['username'] );
		$number    = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 8;
		$widget_id = ! isset( $args['widget_id'] )  ? $this->id : $args['widget_id'];

		// Output the theme's $before_widget wrapper
		echo $before_widget;

			// If a title was input by the user, display it
	        if ( ! empty( $title ) ) {
	        	echo $before_title . esc_html( $title ) . $after_title;
	        }

			// Display the instagram widget
			if ( $username != '' ) {

				$flickr_array = adamas_get_flickr( $username, $number, $widget_id );

				if ( is_wp_error( $flickr_array ) ) {

					echo $flickr_array->get_error_message();

				} else {

				?>

					<div class="adamas-flickr-widget">
						<?php foreach ( $flickr_array as $value ) : ?>
							<a href="<?php echo esc_url( $value['url'] ); ?>" target="_blank">
								<img src="<?php echo esc_url( $value['thumbnail'] ) ?>" alt="<?php esc_html_e( 'Flickr Image', 'adamas' ); ?>" title="<?php esc_html_e( 'Flickr Image', 'adamas' ); ?>" />
							</a>
						<?php endforeach; ?>
					</div>

				<?php
				}
			}

		// Close the theme's widget wrapper
		echo $after_widget;
	}

	/**
	 * Updates the widget control options for the particular instance of the widget
	 *
	 * @since Adamas 1.0
	 */
	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['number']   = absint( $new_instance['number'] );
		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen
	 *
	 * @since Adamas 1.0
	 */
	function form( $instance ) {

		// Set up some default widget settings
		$defaults = array(
			'title'    => 'Photos from Flickr',
			'username' => '125167502@N02',
			'number'   => '8',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<div class="adamas-message adamas-warning" style="margin:15px 0 10px">
			<strong><a href="<?php echo esc_url( 'http://idgettr.com/' ); ?>" target="_blank"><?php esc_html_e( 'Find your Flickr ID', 'adamas' ); ?></a></strong>
		</div>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'adamas' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php esc_html_e( 'Flickr ID:', 'adamas' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo esc_attr( $instance['username'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of photos:', 'adamas' ); ?></label><br>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" />
		</p>

    <?php
	}

}
