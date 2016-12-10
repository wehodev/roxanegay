<?php
/**
 * Instagram Widget Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class Adamas_Widget_Instagram extends WP_Widget {

	/**
	 * Register widget with WordPress
	 *
	 * @since Adamas 1.0
	 */
	function __construct() {
		parent::__construct(
			'adamas_instagram',
			esc_html__( 'Adamas Instagram', 'adamas' ),
			array( 'description' => esc_html__( 'Displays your latest instagram photos.', 'adamas' ) )
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

				$instagram_array = adamas_get_instagram( $username, $number, $widget_id );

				if ( is_wp_error( $instagram_array ) ) {

					echo $instagram_array->get_error_message();

				} else {

				?>

					<div class="adamas-instagram-widget">
						<?php foreach ( $instagram_array as $item ) : ?>
							<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank">
								<img src="<?php echo esc_url( $item['small'] ) ?>" alt="<?php esc_html_e( 'Instagram Image', 'adamas' ); ?>" title="<?php esc_html_e( 'Instagram Image', 'adamas' ); ?>" />
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
			'title'    => 'Photos from Instagram',
			'username' => 'envato',
			'number'   => '8',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'adamas' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php esc_html_e( 'Username:', 'adamas' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo esc_attr( $instance['username'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of photos:', 'adamas' ); ?></label><br>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" />
		</p>

	<?php
	}

}
