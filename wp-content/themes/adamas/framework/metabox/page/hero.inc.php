<?php 
/**
 * Page Meta Box: Footer
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<div id="tab-hero" class="wpus-tab-content">
    
    <!-- Hero Type -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Header Type', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select the header type.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'hero_type' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="off"<?php $mb->the_select_state('off'); ?>><?php esc_html_e( 'None', 'adamas'); ?></option>
                    <option value="basic"<?php $mb->the_select_state('basic'); ?>><?php esc_html_e( 'Basic', 'adamas'); ?></option>
                    <option value="slider"<?php $mb->the_select_state('slider'); ?>><?php esc_html_e( 'Adamas Slider', 'adamas'); ?></option>
                    <?php if ( class_exists( 'RevSlider' ) ) : ?>
                        <option value="revslider"<?php $mb->the_select_state('revslider'); ?>><?php esc_html_e( 'Revolution Slider', 'adamas'); ?></option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Hero Rovolution Slidr -->
    <div id="wpus--hero-revslider" class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Revolution Slider', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select the revolution slider.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'hero_revslider' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <?php foreach ( AdamasShared::rev_sliders() as $key => $value ) : ?>
                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Hero Adamas Slider -->
    <div id="wpus--hero-slider" class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Adamas Slider', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select the adamas slider.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'hero_slider' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <?php foreach ( AdamasShared::sliders() as $key => $value ) : ?>
                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div id="wpus--hero-basic">

        <!-- Hero Title -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Custom Page Title', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Insert custom text for the page header.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_title' ); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Header title text..." />
                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Title Settings', 'adamas' ); ?></a>
                <?php
                $settings_prefix = $settings_title = '';
                $settings_title  = esc_html__( 'Title', 'adamas' );
                $settings_prefix = 'hero_title_';
                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/text_settings.php';
                ?>
            </div>
        </div>

        <!-- Hero Description -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Description', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Enter the page header description.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_desc' ); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Hader description text..." />
                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Description Settings', 'adamas' ); ?></a>
                <?php
                $settings_prefix = $settings_title = '';
                $settings_title  = esc_html__( 'Description', 'adamas' );
                $settings_prefix = 'hero_desc_';
                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/text_settings.php';
                ?>
            </div>
        </div>

        <!-- Hero Content Align -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Content Align', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Select content align.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_align' ); ?>
                <div class="wpus-select-field">
                    <select name="<?php $mb->the_name(); ?>">
                        <option value=""<?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Default', 'adamas' ); ?></option>
                        <option value="text-left"<?php $mb->the_select_state( 'text-left' ); ?>><?php esc_html_e( 'Left', 'adamas' ); ?></option>
                        <option value="text-center"<?php $mb->the_select_state( 'text-center' ); ?>><?php esc_html_e( 'Center', 'adamas' ); ?></option>
                        <option value="text-right"<?php $mb->the_select_state( 'text-right' ); ?>><?php esc_html_e( 'Right', 'adamas' ); ?></option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Hero Layout -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Header Layout', 'adamas') ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Select the header layout.', 'adamas') ?></span>
            </div>
            <div class="wpus-col-md-8">
                <div class="wpus-image-field">
                    <?php $mb->the_field( 'hero_layout' ); ?>
                    <input id="wpus--hero-boxed" type="radio" name="<?php $mb->the_name(); ?>" value="hero-boxed"<?php echo ( $mb->is_value('hero-boxed') || $mb->is_value('') ) ? 'checked="checked"' : ''; ?>/>
                    <label for="wpus--hero-boxed"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/hero_1.png'); ?>" alt="" /></label>
                    <input id="wpus--hero-full-width" type="radio" name="<?php $mb->the_name(); ?>" value="hero-full-width"<?php $mb->the_radio_state('hero-full-width'); ?>/>
                    <label for="wpus--hero-full-width"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/hero_2.png'); ?>" alt="" /></label>
                    <input id="wpus--hero-full-screen" type="radio" name="<?php $mb->the_name(); ?>" value="hero-full-screen"<?php $mb->the_radio_state('hero-full-screen'); ?>/>
                    <label for="wpus--hero-full-screen"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/hero_3.png'); ?>" alt="" /></label>
                </div>
            </div>
        </div>

        <?php echo $mb->is_value( '' )                ? '<style>#wpus--hero-height{display:block}</style>' : ''; ?>
        <?php echo $mb->is_value( 'hero-boxed' )      ? '<style>#wpus--hero-height{display:block}</style>' : ''; ?>
        <?php echo $mb->is_value( 'hero-full-width' ) ? '<style>#wpus--hero-height{display:block}</style>' : ''; ?>
        <?php echo $mb->is_value( 'hero-full-width' ) ? '<style>#wpus--hero-max-width{display:block}</style>' : ''; ?>

        <!-- Hero Max Width -->
        <div id="wpus--hero-max-width" class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Header Max Width', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'The maximum width of the header.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_max_width' ); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or % values"/>
            </div>
        </div>
        
        <!-- Hero Height -->
        <div id="wpus--hero-height" class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Header Height', 'adamas') ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'The height of the header.', 'adamas') ?></span>
            </div>
            <div class="wpus-col-md-8">
                <div class="wpus-row">
                    <div class="wpus-col-lg-3 col-sm-6">
                        <?php $mb->the_field( 'hero_height_lg' ); ?>
                        <span class="wpus-label"><?php esc_html_e( 'Desktop', 'adamas') ?></span>
                        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 600px"/>
                    </div>
                    <div class="wpus-col-lg-3 col-sm-6">
                        <?php $mb->the_field( 'hero_height_md' ); ?>
                        <span class="wpus-label"><?php esc_html_e( 'Notebook', 'adamas') ?></span>
                        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 500px"/>
                    </div>
                    <div class="wpus-col-lg-3 col-sm-6">
                        <?php $mb->the_field( 'hero_height_sm' ); ?>
                        <span class="wpus-label"><?php esc_html_e( 'Tablet', 'adamas') ?></span>
                        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 400px"/>
                    </div>
                    <div class="wpus-col-lg-3 col-sm-6">
                        <?php $mb->the_field( 'hero_height_xs' ); ?>
                        <span class="wpus-label"><?php esc_html_e( 'Mobile', 'adamas') ?></span>
                        <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 300px"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Background Image -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Background Image', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Upload image for the gallery.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_background_image' ); ?>
                <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_id' ) ); ?>
                <?php $mb->the_field( 'hero_src' ); ?>
                <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_src' ) ); ?>
                <div class="wpus-mediawrap">
                    <span>
                        <img src="<?php $mb->the_value(); ?>" alt="" />
                        <i class="wpus-del-media dashicons dashicons-no-alt"></i>
                    </span>
                </div>
                <div class="wpus-media-button-wrap">
                    <?php echo $wpalchemy_media_access->getButton(); ?>
                    <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Background Image Settings', 'adamas' ); ?></a>
                    <?php
                    $settings_prefix = '';
                    $settings_prefix = 'hero_';
                    include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/background_settings.php';
                    ?>
                </div>
            </div>
        </div>
                    
        <!-- Hero YouTube URL -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'YouTube URL', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Enter YouTube URL.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_youtube_url' ); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Enter youtube URL..." />
            </div>
        </div>
                    
        <!-- Hero Background Color -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Background Color:', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Select header background color.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_background_color' ); ?>
                <input class="wpus-colorpicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
            </div>
        </div>
                    
        <!-- Hero Overlay Color -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Overlay Color:', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Select header overlay color.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'hero_overlay_color' ); ?>
                <input class="wpus-colorpicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
            </div>
        </div>

        <!-- Hero Parallax -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Parallax', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Choose a scrolling effect for the background.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <div class="wpus-select-field">
                    <?php $mb->the_field( 'hero_parallax' ); ?>
                    <select name="<?php $mb->the_name(); ?>">
                        <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'No', 'adamas' ); ?></option>
                        <?php foreach ( AdamasShared::parallax() as $key => $value ) : ?>
                            <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Hero Content Fade -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Fade Content on Scroll', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Choose a scrolling effect for the text.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <div class="wpus-select-field">
                    <?php $mb->the_field( 'hero_fade_content' ); ?>
                    <select name="<?php $mb->the_name(); ?>">
                        <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'No', 'adamas' ); ?></option>
                        <option value="yes" <?php $mb->the_select_state( 'yes' ); ?>><?php esc_html_e( 'Yes', 'adamas' ); ?></option>
                    </select>
                </div>
            </div>
        </div>

    </div><!-- #wpus-hero-basic -->

</div><!-- .wpus-tab-content -->