<?php
/**
 * Portfolio Widget Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class Adamas_Widget_Portfolio extends WP_Widget {

	/**
	 * Register widget with WordPress
	 *
	 * @since Adamas 1.0
	 */
	function __construct() {
		parent::__construct(
			'adamas_portfolio',
			esc_html__( 'Adamas Portfolio', 'adamas' ),
			array( 'description' => esc_html__( 'Displays your projects.', 'adamas' ) )
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
		$title    = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category = strip_tags( $instance['category'] );
		$orderby  = ! empty( $instance['orderby'] ) ? strip_tags( $instance['orderby'] ) : 'recent';
		$number   = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 8;

		// Output the theme's $before_widget wrapper
		echo $before_widget;

			// If a title was input by the user, display it
            if ( ! empty( $title ) ) {
            	echo $before_title . esc_html( $title ) . $after_title;
            }

            // Display the widget
			$show_portfolio = $this->do_portfolio( $category, $orderby, $number );

			if ( is_wp_error( $show_portfolio ) ) {
				echo $show_portfolio->get_error_message();
			} else {
				echo $show_portfolio;
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
		$instance['category'] = strip_tags( $new_instance['category'] );
		$instance['orderby']  = strip_tags( $new_instance['orderby'] );
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
			'title'    => 'Recent Projects',
			'category' => '',
			'orderby'  => 'recent',
			'number'   => '8',
		);

		$instance = wp_parse_args( ( array ) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'adamas' ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Category:', 'adamas' ); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'category' ); ?>" id="<?php echo $this->get_field_id( 'category' ); ?>">
				<option value ="all" <?php selected( $instance['category'], 'all', true ); ?>><?php esc_html_e( 'All', 'adamas' ); ?></option>
				<?php $get_terms = get_terms( 'portfolio-category', 'hide_empty=0' ); ?>
				<?php foreach ( $get_terms as $value ) : ?>
					<option value="<?php echo esc_attr( $value->term_id ); ?>" <?php selected( $instance['category'], $value->term_id, true); ?>><?php echo esc_attr( $value->name ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e( 'Order by:', 'adamas' ); ?></label><br>
			<select name="<?php echo $this->get_field_name( 'orderby' ); ?>" id="<?php echo $this->get_field_id( 'orderby' ); ?>"  class="widefat">
				<option value ="DESC" <?php selected( $instance['orderby'], 'DESC', true ); ?>><?php esc_html_e( 'Recent', 'adamas' ); ?></option>
				<option value ="comment_count" <?php selected( $instance['orderby'], 'comment_count', true ); ?>><?php esc_html_e( 'Popular', 'adamas' ); ?></option>
				<option value ="rand" <?php selected( $instance['orderby'], 'rand', true ); ?>><?php esc_html_e( 'Random', 'adamas' ); ?></option>
				<option value="modified" <?php selected( $instance['orderby'], 'modified', true ); ?>><?php esc_html_e( 'Last modified', 'adamas' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of projects to show:', 'adamas' ); ?></label>
			<input class="widefat" type="number" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>">
		</p>

	<?php
	}

	/**
	 * Do portfolio content
	 *
	 * @since Adamas 1.0
	 */
	function do_portfolio( $category, $orderby, $number ) {

		global $post;

		// Set args
		$args = array(
			'post_type'         => array( 'portfolio' ),
			'posts_per_page'    => $number,
			'orderby'           => $orderby,
			'meta_key'          => '_thumbnail_id',
			'post__not_in'      => ( is_singular() ) ? array( get_the_ID() ) : NULL,
			'no_found_rows'     => true,
		);

		if ( $category != 'all' ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'portfolio-category',
				'field'    => 'id',
				'terms'    => array( $category ),
			);
		}

		if ( ! $portfolio_loop = new WP_Query( $args ) ) {
			return new WP_Error( 'no_post', esc_html__( 'No projects yet.', 'adamas' ) );
		}

		// Build output
		$html = '<div class="adamas-portfolio-widget">';
			while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
				$html .= '<a href="' . esc_url( get_the_permalink() ) . '" title="' . esc_html( get_the_title() ) . '">';
					$html .= get_the_post_thumbnail( $post->ID, array( 80, 80 ), array( 'alt' => get_the_title() ) );
				$html .= '</a>';
			endwhile;
		$html .= '</div>';

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		// Apply filter and Return
		return apply_filters( 'adamas_portfolio_widget', $html );

	}
}
