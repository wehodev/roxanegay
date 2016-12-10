<?php
/**
 * Single Product tabs
 *
 * @author 	WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $nm_theme_options;

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

    <div class="woocommerce-tabs wc-tabs-wrapper">
        
        <div class="container">
        	<div class="row">
                <div class="centered col-md-10 col-xs-12">
                    <ul class="tabs wc-tabs">
                        <?php foreach ( $tabs as $key => $tab ) : ?>
                            <li class="<?php echo esc_attr( $key ); ?>_tab">
                                <a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
            
        <?php foreach ( $tabs as $key => $tab ) : ?>
            
            <?php
            $content = '';
            if ( $key == 'description' ) {
                ob_start();
                call_user_func( $tab['callback'], $key, $tab );
                $content = ob_get_clean();
            } ?>

			<?php if ( strpos( $content, 'wpus-section' ) ) { ?>
                <div class="panel wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
				    <?php call_user_func( $tab['callback'], $key, $tab ); ?>
                </div>
			<?php } else { ?>
                <div class="panel wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
                    <div class="container">
        				<div class="row">
                            <div class="centered col-md-9 col-xs-12">
                                <?php call_user_func( $tab['callback'], $key, $tab ); ?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php } ?>

        <?php endforeach; ?>

    </div>

<?php endif; ?>
