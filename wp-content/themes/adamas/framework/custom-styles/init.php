<?php
/**
 * Dynamic Style
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}


function adamas_theme_custom_css() {

    // Declare variables
    $css_output = '';

    // Get color
    $accent_color    = adamas_get_data( 'accent_color' );
    $first_color     = adamas_get_data( 'first_color' );
    $second_color    = adamas_get_data( 'second_color' );
    $third_color     = adamas_get_data( 'third_color' );
    $el_border_color = adamas_get_data( 'el_border_color' );
    $el_bg_color     = adamas_get_data( 'el_background_color' );

    // Font size
    $body_font_size = adamas_get_data( 'body_typography', 'font-size' );
    $h1_font_size   = adamas_get_data( 'h1_typography', 'font-size' );
    $h2_font_size   = adamas_get_data( 'h2_typography', 'font-size' );
    $h3_font_size   = adamas_get_data( 'h3_typography', 'font-size' );
    $h4_font_size   = adamas_get_data( 'h4_typography', 'font-size' );
    $h5_font_size   = adamas_get_data( 'h5_typography', 'font-size' );
    $h6_font_size   = adamas_get_data( 'h6_typography', 'font-size' );

    // Medium font size
    $medium_font_size = '';
    if ( $body_font_size ) {
        $medium_font_size = absint( $body_font_size ) - 1 . 'px';
    }

    // Text selection
    if ( $accent_color ) {
        $css_output .= "::selection{background-color:{$accent_color}}";
        $css_output .= "::-moz-selection{background-color:{$accent_color}}";
    }

    // Disable blog header box shadow
    if ( adamas_get_data( 'blog_header_box_shadow' ) ) {
        $blog_header_box_shadow = AdamasHelper::get_style( array( 'box_shadow' => 'none' ) );
        $css_output .= "body.blog .site-header:not(.is-shrunk) .site-header-inner{{$blog_header_box_shadow}}";
    }

    // Disable blog header border
    if ( adamas_get_data( 'blog_header_border' ) ) {
        $blog_header_border = AdamasHelper::get_style( array( 'border_bottom_style' => 'none' ) );
        $css_output .= "body.blog .site-header:not(.is-shrunk) .site-header-inner{{$blog_header_border}}";
    }

    // Disable header box shadow
    if ( adamas_get_data( 'product_header_box_shadow' ) ) {
        $product_header_box_shadow = AdamasHelper::get_style( array( 'box_shadow' => 'none' ) );
        $css_output .= "body.single-product .site-header:not(.is-shrunk) .site-header-inner{{$product_header_box_shadow}}";
    }

    // Disable header border
    if ( adamas_get_data( 'product_header_border' ) ) {
        $product_header_border = AdamasHelper::get_style( array( 'border_bottom_style' => 'none' ) );
        $css_output .= "body.single-product .site-header:not(.is-shrunk) .site-header-inner{{$product_header_border}}";
    }


    /*-------------------------------------------------------------------------*/
    /*  Body Background
    /*-------------------------------------------------------------------------*/

    	if ( $body_bg_css = AdamasHelper::get_style( adamas_get_data( 'body_background' ) ) ) {
		    $css_output .= "body{{$body_bg_css}}";
		}

    /*-------------------------------------------------------------------------*/
    /*  Typography
    /*-------------------------------------------------------------------------*/

        if ( $body_font_size ) {
            $css_output .= "
                .post-navigation span {
                    font-size:{$body_font_size}
                }
            ";
        }

        if ( $h3_font_size ) {
            $css_output .= "
                .wpus-blog-large .entry-title {
                    font-size:{$h3_font_size}
                }
            ";
        }

        if ( $h4_font_size ) {
            $css_output .= "
                .wpus-blog-grid .entry-title,
                .wpus-blog-medium .entry-title,
                .archive-title h2,
                .comments-area h3,
                .cart-collaterals h2,
                .cart-collaterals .cart-shipping-calculator > p a,
                .product-summary .price,
                .upsells h2,
                .related h2 {
                    font-size:{$h4_font_size}
                }
            ";
        }

        if ( $h5_font_size ) {
            $css_output .= "
                .wpus-portfolio .wpus-title h3 {
                    font-size:{$h5_font_size}
                }
            ";
        }

        if ( $h6_font_size ) {
            $css_output .= "
                .post-navigation a,
                #wp-calendar caption,
                .wpus-product h3,
                .wpus-product .price {
                    font-size:{$h6_font_size}
                }
            ";
        }

        if ( $medium_font_size ) {
            $css_output .= "
                .site-top-bar,
                .comment-metadata,
                .entry-share a,
                pre, code,
                .wpus-slide-button.size-sm,
                .wpus-slide-button.size-md,
                .wpus-portfolio .wpus-title p,
                .wpus-button.size-sm,
                .wpus-figure-caption,
                .wpus-testimonial-meta span,
                .wpus-twitter-date,
                #wp-calendar thead th,
                .widget .wpus-widget-meta,
                .widget .post-date,
                .widget .rss-date,
                .widget .post-count,
                .widget cite,
                .payment_methods .payment_box,
                .select2-drop .select2-results,
                .product-breadcrumbs,
                .product-summary .stock.out-of-stoc,
                .group_table td.price .stock,
                #reviews .meta time {
                    font-size:{$medium_font_size}
                }
            ";
        }

    /*-------------------------------------------------------------------------*/
    /*  Accent color
    /*-------------------------------------------------------------------------*/

        if ( $accent_color ) :

            $css_output .= "
                a,
                h1 a:hover, h2 a:hover, h3 a:hover,
                h4 a:hover, h5 a:hover, h6 a:hover,
                .entry-meta a:hover,
                .comment-metadata a:hover,
                .post-navigation a:hover,
                .footer-widgets a:hover,
                .site-menu .menu-link:hover,
                .site-sidebar .widget li > a:hover,
                .wpus-portfolio a:hover .title-under h3,
                .wpus-filter a:hover .wpus-filter a.active,
                .wpus-filter.style-minimal a.active,
                .wpus-filter.style-minimal a:hover,
                .wpus-flip-box .wpus-button.style-bg,
                .wpus-flip-box .wpus-button.style-bg:hover,
                .wpus-list i.list-icon,
                .wpus-button.wpus-link,
                .wpus-pricing-price,
                .my_account_orders .button,
                .woocommerce .order_details a:hover,
                .form-row label .required,
                .product-breadcrumbs a:hover,
                .product-summary .price .ammount,
                .group_table td.label a:hover,
                #review_form .comment-form-rating .stars:hover a,
                #review_form .comment-form-rating .stars.has-active a,
                .product_meta a:hover,
                .wpus-product ins .amount,
                .star-rating:before,
                .star-rating span:before,
                .widget_product_categories li.current > a,
                .widget_layered_nav li.chosen a,
                .widget_layered_nav_filters li.chosen a,
                .product_list_widget li ins .amount,
                .wpus-slide-button.style-outline.color-accent,
                .wpus-theme-slider.arrows-outline.arrows-accent .owl-nav div,
                .wpus-theme-slider.arrows-outline.arrows-accent .owl-nav div:hover,
                .wpus-portfolio-nav .prev:hover,
				.wpus-portfolio-nav .next:hover {
                    color:{$accent_color}
                }
            ";

            $css_output .= "
                .button,
                button,
                [type=\"button\"],
                [type=\"reset\"],
                [type=\"submit\"],
                .entry-share a:hover,
                .wpus-carousel .owl-dot.active span,
                .wpus-carousel .owl-dot:hover span,
                .wpus-load-more.style-bg .wpus-button:hover,
                .wpus-load-more.style-outline .wpus-button:hover,
                .site-pagination.style-bg a:hover,
                .site-pagination.style-outline a:hover,
                .site-pagination.style-bg .current,
                .site-pagination.style-outline .current,
                .wpus-preloader,
                .site-sidebar .widget .tagcloud a:hover,
                .wpus-filter.style-bg a:hover,
                .wpus-filter.style-outline a:hover,
                .wpus-filter.style-bg a.active,
                .wpus-filter.style-outline a.active,
                .wpus-team-social,
                .wpus-flip-box .wpus-flip-box-back,
                .wpus-bar-active,
                .wpus-social.style-bg .wpus-social-link:hover,
                .wpus-button.style-bg,
                .order-info mark,
                .order-info .order-number,
                .order-info .order-date,
                .order-info .order-status,
                .wpus-checkout-cart.wpus-button,
                .wpus-slide-button.style-bg.color-accent,
                .wpus-slide-button.style-outline.color-accent:hover,
                .wpus-theme-slider.dots-accent .owl-dot.active span,
                .wpus-theme-slider.dots-accent .owl-dot:hover span,
                .wpus-theme-slider.arrows-bg.arrows-accent .owl-nav div,
                .wpus-theme-slider.arrows-outline.arrows-accent .owl-nav div:hover {
                    background-color:{$accent_color}
                }
            ";

            $css_output .= "
                .widget_layered_nav li.chosen a,
                .widget_layered_nav_filters li.chosen a,
                .wpus-slide-button.style-outline.color-accent {
                    border-color:{$accent_color}
                }
            ";

            $bd_accent_1 = AdamasHelper::hex2rgba( $accent_color, .4 );
            $css_output .= "
                .wpus-carousel .owl-dot span,
                .wpus-slide-button.style-bg.color-accent:hover,
                .wpus-theme-slider.arrows-outline.arrows-accent .owl-nav div {
                    border-color:{$bd_accent_1}
                }
            ";

            $bd_accent_2 = AdamasHelper::hex2rgba( $accent_color, .8 );
            $css_output .= "
                .wpus-checkout-cart.wpus-button:hover,
                .wpus-slide-button.style-bg.color-accent:hover,
                .wpus-theme-slider.arrows-bg.arrows-accent .owl-nav div:hover {
                    background-color:{$bd_accent_2}
                }
            ";

        endif;

    /*-------------------------------------------------------------------------*/
    /*  First color
    /*-------------------------------------------------------------------------*/

        if ( $first_color ) :

            $css_output .= "
                h1,h2,h3,h4,h5,h6,
                a:hover,
                table th,
                .archive-title h2 span,
                .post-navigation a,
                .comment-author,
                .comment-awaiting-moderation,
                .no-comments,
                #wp-calendar caption,
                #wp-calendar thead th,
                .wpus-team-name,
                .wpus-social.style-bg .wpus-social-link,
                .wpus-social.style-outline .wpus-social-link,
                .wpus-social.style-outline .wpus-social-link:hover,
                .wpus-button.style-outline,
                .wpus-button.wpus-link:hover,
                .wpus-toggle-header:hover, .wpus-toggle-header.active,
                .wpus-tab-header a.active, .wpus-tab-header a:hover,
                .wpus-tab-header a.active i, .wpus-tab-header a:hover i,
                .wpus-tab-wrapper.style-minimal .wpus-tab-header a.active,
                .wpus-carousel-nav.style-bg span,
                .wpus-carousel-nav.style-outline span,
                .wpus-carousel-nav.style-outline span:hover,
                .cart-collaterals h2,
                .cart-collaterals .cart-shipping-calculator > p a,
                .order_details,
                .order_details li .product-name > a,
                .addresses,
                .form-row label,
                .input-radio:checked + label:before,
                .input-checkbox:checked + label:before,
                .product-images .owl-prev,
                .product-images .owl-next,
                .product-summary .qty,
                .group_table td.label a,
                .product-summary .variations,
                .woocommerce-tabs .tabs li.active a,
                #reviews .meta strong,
                .product_meta,
                .product-nav a:hover,
                p.create-account,
                #ship-to-different-address,
                .payment_methods label,
                .wpus-load-more.style-bg .wpus-button,
                .wpus-load-more.style-outline .wpus-button,
                .wpus-carousel.arrows-bg .owl-nav div,
                .wpus-carousel.arrows-outline .owl-nav div,
                .wpus-carousel.arrows-outline .owl-nav div:hover,
                .wpus-portfolio-nav .prev,
				.wpus-portfolio-nav .next {
                    color:{$first_color}
                }
            ";

            $css_output .= "
                .button:hover,
                button:hover,
                [type=\"button\"]:hover,
                [type=\"reset\"]:hover,
                [type=\"submit\"]:hover,
                .wpus-button.style-bg:hover,
                .wpus-button.style-outline:hover,
                .wpus-carousel-nav.style-bg span:hover,
                .wpus-carousel.arrows-bg .owl-nav div:hover {
                    background-color:{$first_color}
                }
            ";

            $css_output .= "
                .input-checkbox:checked + label:before,
                .wpus-carousel.arrows-outline .owl-nav div:hover{
                    border-color:{$first_color}
                }
            ";

        endif;

    /*-------------------------------------------------------------------------*/
    /*  Second color
    /*-------------------------------------------------------------------------*/

        if ( $second_color ) :
            $css_output .= "
                body {
                    color:{$second_color}
                }
            ";
        endif;

    /*-------------------------------------------------------------------------*/
    /*  Third color
    /*-------------------------------------------------------------------------*/

        if ( $third_color ) :
            $css_output .= "
                .entry-meta,
                .archive-title h2,
                .post-navigation span,
                .entry-share a,
                .comment-metadata,
                .widget .wpus-widget-meta,
                .widget .post-date,
                .widget .rss-date,
                .widget .post-count,
                .widget cite,
                .wpus-portfolio .title-under p,
                .wpus-filter.style-minimal a,
                .wpus-team-role,
                .wpus-figure-caption.title-under,
                .wpus-testimonial-meta span,
                .wpus-toggle-icon,
                .wpus-tab-header a,
                .wpus-tab-header i,
                .wpus-pricing p,
                .wpus-twitter-date,
                .product-breadcrumbs,
                .product-summary .price del .amount,
                .group_table td.price .stock,
                .woocommerce-tabs .tabs a,
                #reviews .meta,
                #review_form .comment-form-rating .stars a,
                #review_form .comment-form-rating .stars a:hover ~ a,
                #review_form .comment-form-rating .stars.has-active a.active ~ a,
                .product_meta span.sku,
                .product_meta a,
                .product-nav a,
                .wpus-product h3,
                .wpus-product .price,
                .payment_methods .payment_box,
                .wpus-portfolio-nav .prev:before:hover,
				.wpus-portfolio-nav .next:before:hover {
                    color:{$third_color}
                }
            ";
        endif;

    /*-------------------------------------------------------------------------*/
    /*  Border color
    /*-------------------------------------------------------------------------*/

        if ( $el_border_color ) :

            $css_output .= "
                blockquote,
                table th,
                table td,
                table th,
                hr,
                .wpus-search-results article:not(:last-child),
                .post-navigation,
                .wpus-filter.style-outline a,
                .wpus-divider.type-simple .wpus-divider-line,
                .wpus-divider:not(.type-simple) .wpus-divider-line:before,
                .wpus-divider:not(.type-simple) .wpus-divider-line:after,
                .wpus-social.style-outline .wpus-social-link,
                .wpus-icon-wrap.style-outline,
                .wpus-button.style-outline,
                .wpus-testimonial-grid,
                .style-outline .wpus-toggle-header,
                .style-minimal .wpus-toggle-icon,
                .wpus-pricing,
                .wpus-carousel-nav.style-outline span,
                .cart-actions,
                .order_details li,
                .select2-drop .select2-search .select2-input,
                .woocommerce-tabs,
                #reviews .comment_container,
                .upsells,
                .related,
                .payment_methods li,
                .site-pagination.style-outline a,
                .site-pagination.style-outline span,
                .wpus-load-more.style-outline .wpus-button,
                .wpus-carousel.arrows-outline .owl-nav div,
                .wpus-portfolio-nav {
                    border-color:{$el_border_color}
                }
            ";

            $css_output .= "
                .wpus-social.style-outline .wpus-social-link:hover,
                .wpus-toggle-icon,
                .style-minimal .active .wpus-toggle-icon,
                .wpus-carousel-nav.style-outline span:hover {
                    background-color:{$el_border_color}
                }
            ";

        endif;

    /*-------------------------------------------------------------------------*/
    /*  Element background color
    /*-------------------------------------------------------------------------*/

        if ( $el_bg_color ) :
            $css_output .= "
                pre, code,
                [type=\"text\"],
                [type=\"password\"],
                [type=\"date\"],
                [type=\"datetime\"],
                [type=\"email\"],
                [type=\"number\"],
                [type=\"search\"],
                [type=\"tel\"],
                [type=\"time\"],
                [type=\"url\"],
                textarea,
                select,
                .entry-share a,
                .comments-area,
                .comment_form_message textarea,
                .widget .tagcloud a,
                .wpus-filter.style-bg a,
                .wpus-box,
                .wpus-flip-box .wpus-flip-box-front,
                .wpus-social.style-bg .wpus-social-link,
                .wpus-icon-box.wpus-icon-center-top,
                .wpus-icon-wrap.style-bg,
                .style-bg .wpus-toggle-header,
                .wpus-tab-wrapper.style-standart .wpus-tab-header a.active,
                .wpus-tab-wrapper.style-standart .wpus-tab-content,
                .wpus-carousel-nav.style-bg span,
                .select2-container .select2-choice,
                .select2-drop,
                .select2-drop .select2-results,
                .site-pagination.style-bg a,
                .site-pagination.style-bg span,
                .wpus-load-more.style-bg .wpus-button,
                .wpus-carousel.arrows-bg .owl-nav div{
                    background-color:{$el_bg_color}
                }
            ";
        endif;

	/*-------------------------------------------------------------------------*/
    /*  Preloader
    /*-------------------------------------------------------------------------*/

    	if ( $preloader_color_css = AdamasHelper::get_style( array( 'background_color' => adamas_get_data( 'preloader_color' ) ) ) ) {
		    $css_output .= ".wpus-preloader{{$preloader_color_css}}";
		}

		if ( $preloader_bg_css = AdamasHelper::get_style( array( 'background_color' => adamas_get_data( 'preloader_bg_color' ) ) ) ) {
		    $css_output .= "#wpus-preloader{{$preloader_bg_css}}";
		}


    // Top bar
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/top_bar.php';

    // Header - Top
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/header.php';

    // Header - Side
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/side-menu.php';

    // Logo
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/logo.php';

    // Footer
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/footer.php';

    // Copyright
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/copyright.php';

    // Typography
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/typography.php';

    // Woocommerce
    require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/partials/woocommerce.php';

    // Custom css
    $custom_css = adamas_get_data( 'custom_css' );
    $custom_css = str_replace( '$accent_color', $accent_color, $custom_css);
    $custom_css = str_replace( '$first_color', $first_color, $custom_css);
    $custom_css = str_replace( '$third_color', $third_color, $custom_css);
    $custom_css = str_replace( '$el_border_color', $el_border_color, $custom_css);
    $custom_css = str_replace( '$el_bg_color', $el_bg_color, $custom_css);

	// Add inline style
    $css_output = AdamasHelper::get_minify_css( $css_output ) . $custom_css;
    update_option( 'adamas_theme_custom_styles', $css_output, true );

}

add_action( 'redux/options/adamas_data/saved', 'adamas_theme_custom_css' );


function adamas_set_custom_theme_styles() {
    if ( ! get_option( 'adamas_theme_custom_styles' ) && get_option( 'adamas_data' ) ) {
        adamas_theme_custom_css();
    }
}

add_action( 'redux/options/adamas_data/register', 'adamas_set_custom_theme_styles' );


function adamas_head_custom_styles() {

    $styles = get_option( 'adamas_theme_custom_styles' );

    // Disable blog header box shadow
    if ( ! adamas_get_meta_data( 'header_box_shadow' ) ) {
        $header_box_shadow = AdamasHelper::get_style( array( 'box_shadow' => 'none' ) );
        $styles .= ".site-header:not(.is-shrunk) .site-header-inner{{$header_box_shadow}}";
    }

    // Disable blog header border
    if ( ! adamas_get_meta_data( 'header_border' ) ) {
        $header_border = AdamasHelper::get_style( array( 'border_bottom_style' => 'none' ) );
        $styles .= ".site-header:not(.is-shrunk) .site-header-inner{{$header_border}}";
    }

    echo '<style id="wpus-header-custom-style">' . $styles . '</style>' . "\n";
}

add_action( 'wp_head', 'adamas_head_custom_styles', 300 );

// Hero section style
require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/hero.php';
