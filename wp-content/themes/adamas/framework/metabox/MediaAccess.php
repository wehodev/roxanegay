<?php
/**
 * @author   	Dimas Begunoff
 * @copyright	Copyright (c) 2011, Dimas Begunoff, http://farinspace.com/
 * @license  	http://en.wikipedia.org/wiki/MIT_License The MIT License
 * @package  	MomizatMB
 * @version  	0.2.1
 * @link     	http://github.com/farinspace/wpalchemy/
 * @link     	http://farinspace.com/
 */

 class WPAlchemy_MediaAccess {

	/**
	 * MediaAccess class
	 *
	 * @since	0.1
	 * @access	public
	 */
	public function __construct() {
		add_action('admin_footer', array($this, 'init'));
	}

	/**
	 * Used to insert a form field of type "text", this should be paired with a
	 * button element. The name and value attributes are required.
	 *
	 * @since	0.1
	 * @access	public
	 * @param	array $attr INPUT tag parameters
	 * @return	HTML
	 */
	public function getField( array $attr ) {

		$attr_default = array (
			'type'  => 'text',
			'class' => 'wpus-mediafield',
		);

		if ( isset( $attr['class'] ) ) {
			$attr['class'] = $attr_default['class'] . ' ' . trim( $attr['class'] );
		}

		$attr = array_merge( $attr_default, $attr );

		$elem_attr = array();

		foreach ( $attr as $n => $v ) {
			array_push( $elem_attr, $n . '="' . $v . '"' );
		}

		return '<input ' . implode( ' ', $elem_attr ) . '/>';
	}

	/**
	 * Used to insert a WordPress styled button, should be paired with a text
	 * field element.
	 *
	 * @since	0.1
	 * @access	public
	 * @return	HTML
	 */
	public function getButton( array $attr = array() ) {

		$attr_default = array (
			'label' => '<i class="dashicons dashicons-upload"></i>',
			'class' => 'wpus-mediabutton',
		);

		if ( isset( $attr['class'] ) ) {
			$attr['class'] = $attr_default['class'] . ' ' . trim( $attr['class'] );
		}

		$attr = array_merge( $attr_default, $attr );

		$label = $attr['label'];
		unset( $attr['label'] );

		$elem_attr = array();

		foreach ( $attr as $n => $v ) {
			array_push( $elem_attr, $n . '="' . $v . '"' );
		}

		return '<a href="#" ' . implode(' ', $elem_attr) . '>' . $label . '</a>';
	}

	/**
	 * Used to insert global STYLE or SCRIPT tags into the footer, called on
	 * WordPress admin_footer action.
	 *
	 * @since	0.1
	 * @access	public
	 * @return	HTML/Javascript
	 */
	public function init() {

		$uri  = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : NULL ;
		$file = basename(parse_url($uri, PHP_URL_PATH));

		if ( $uri AND in_array( $file, array( 'post.php', 'post-new.php' ) ) ) : ?>

			<script type="text/javascript">
			/* <![CDATA[ */
				jQuery(function($) {

					//Create WP media frame.
					var customMediaManager;
					var formlabel = 0;
					
					$(document).on('click', '.wpus-mediabutton', function(e) {

						if($(this).hasClass('wpus-gallerybutton')) {
							return;
						}
						
						e.preventDefault();
						
						// If the frame already exists, re-open it.
						if ( customMediaManager ) {
							customMediaManager.open();
							return;
						}
						
						// Get our Parent element
						formlabel = jQuery(this).parent().parent();
						
						var customMediaManager = wp.media.frames.customMediaManager = wp.media({
							//Title of media manager frame
							title: "Upload Document",
							library: {
								type: ''
							},
							frame: 'select',
							multiple: false
						});

						customMediaManager.on('select', function(){
							var media_attachment = customMediaManager.state().get('selection').first().toJSON();
							if (media_attachment.type === 'image') {
								formlabel.find('.adamas_img_id').val(media_attachment.id);
								var thumb = '';
								if (typeof media_attachment.sizes['thumbnail'] !== 'undefined') {
									thumb = media_attachment.sizes['thumbnail']['url'];
								} else {
									thumb = media_attachment.sizes['full']['url'];
								}
								formlabel.find('input.adamas_img_src').val(thumb);
								formlabel.find('.wpus-mediawrap img').attr('src',thumb);
							} else {
								formlabel.find('input[type="text"]').val(media_attachment.url);	
							}
						});
						
						customMediaManager.open();
					});

					$(document).on( 'click', '.wpus-del-media', function(e) {
				        e.preventDefault();
				        var $parent = $(this).closest('.wpus-mediawrap').parent();
				        $parent.find('.wpus-mediafield').val('');
				        $parent.find('.adamas_img_src').val('');
				        $parent.find('img').attr('src','');
				    });

				});
			/* ]]> */
			</script>

		<?php
		endif;
	}
}