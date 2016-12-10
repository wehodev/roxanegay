<?php
/**
 * Slider Meta Box Template
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

global $post;
global $wpalchemy_media_access;
?>

<div class="wpus-wrap wpus-meta-box">

    <!-- Slider shortcode -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Slider Shortcode', 'adamas') ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Place the shortcode where you want to show the slider.', 'adamas') ?></span>
        </div>
        <div class="wpus-col-md-8">
            <input class="wpus-readonly" type="text" value='[adamas_slider id="<?php echo $post->ID; ?>"]' name="adamas-slider-shortcode" readonly="readonly">
        </div>
    </div>

    <!-- Slider layout -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Slider Layout', 'adamas') ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select the slider layout.', 'adamas') ?></span>
        </div>
        <div class="wpus-col-md-8">
            <div class="wpus-image-field">
                <?php $mb->the_field( 'layout' ); ?>
                <input id="slider-boxed" type="radio" name="<?php $mb->the_name(); ?>" value="slider-boxed"<?php echo ( $mb->is_value('slider-boxed') || $mb->is_value('') ) ? 'checked="checked"' : ''; ?>/>
                <label for="slider-boxed"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/width_1.png'); ?>" alt="" /></label>
                <input id="slider-full-width" type="radio" name="<?php $mb->the_name(); ?>" value="slider-full-width"<?php $mb->the_radio_state('slider-full-width'); ?>/>
                <label for="slider-full-width"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/width_2.png'); ?>" alt="" /></label>
                <input id="slider-full-screen" type="radio" name="<?php $mb->the_name(); ?>" value="slider-full-screen"<?php $mb->the_radio_state('slider-full-screen'); ?>/>
                <label for="slider-full-screen"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/width_3.png'); ?>" alt="" /></label>
            </div>
        </div>
    </div>

    <?php echo $mb->is_value( '' )                  ? '<style>#wpus--slider-height{display:block}</style>' : ''; ?>
    <?php echo $mb->is_value( 'slider-boxed' )      ? '<style>#wpus--slider-height{display:block}</style>' : ''; ?>
    <?php echo $mb->is_value( 'slider-full-width' ) ? '<style>#wpus--slider-height{display:block}</style>' : ''; ?>
    <?php echo $mb->is_value( 'slider-full-width' ) ? '<style>#wpus--slider-max-width{display:block}</style>' : ''; ?>

    <!-- Slider maximum width -->
    <div id="wpus--slider-max-width" class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Slider Max Width', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'The maximum width of the Slider.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'max_width' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or % values"/>
        </div>
    </div>

    <!-- Slider height -->
    <div id="wpus--slider-height" class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Slider Height', 'adamas') ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'The height of the slider.', 'adamas') ?></span>
        </div>
        <div class="wpus-col-md-8">
            <div class="wpus-row">
                <div class="wpus-col-lg-3 col-sm-6">
                    <?php $mb->the_field( 'height_lg' ); ?>
                    <span class="wpus-label"><?php esc_html_e( 'Desktop', 'adamas') ?></span>
                    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 600px"/>
                </div>
                <div class="wpus-col-lg-3 col-sm-6">
                    <?php $mb->the_field( 'height_md' ); ?>
                    <span class="wpus-label"><?php esc_html_e( 'Notebook', 'adamas') ?></span>
                    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 500px"/>
                </div>
                <div class="wpus-col-lg-3 col-sm-6">
                    <?php $mb->the_field( 'height_sm' ); ?>
                    <span class="wpus-label"><?php esc_html_e( 'Tablet', 'adamas') ?></span>
                    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 400px"/>
                </div>
                <div class="wpus-col-lg-3 col-sm-6">
                    <?php $mb->the_field( 'height_xs' ); ?>
                    <span class="wpus-label"><?php esc_html_e( 'Mobile', 'adamas') ?></span>
                    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Default: 300px"/>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider autoplay -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Autoplay', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Auto rotate slides each X seconds.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <div class="wpus-select-field">
                <?php $mb->the_field( 'autoplay' ); ?>
                <select name="<?php $mb->the_name(); ?>">
                    <?php foreach ( AdamasShared::autoplay() as $key => $value ) : ?>
                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <!-- Slider loop -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Inifnity Loop', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Duplicate last and first items to get loop illusion.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <div class="wpus-select-field">
                <?php $mb->the_field( 'inifnity_loop' ); ?>
                <select name="<?php $mb->the_name(); ?>">
                    <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'No', 'adamas' ); ?></option>
                    <option value="yes" <?php $mb->the_select_state( 'yes' ); ?>><?php esc_html_e( 'Yes', 'adamas' ); ?></option>
                </select>
            </div>
        </div>
    </div>

    <!-- Slider arrows -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Arrows', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Arrows settings.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Arrows Settings', 'adamas' ); ?></a>
            <?php include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/arrows_settings.php'; ?>
        </div>
    </div>

    <!-- Slider dots -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Dots', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Dots settings.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Dots Settings', 'adamas' ); ?></a>
            <?php include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/dots_settings.php'; ?>
        </div>
    </div>

    <!-- SLIDES: START -->
    <div class="wpus-slider-metabox">
        <?php while ( $mb->have_fields_and_multi( 'items' ) ): ?>
            <?php $mb->the_group_open(); ?>

                <span class="shandle dashicons dashicons-menu"></span>
                <a href="#" class="dodelete dashicons dashicons-trash"></a>

                <div class="wpus-slider-metabox-inside">

                    <!-- Slides tabs -->
                    <ul class="wpus-slider-tab-header">
                        <li data-tab="#slider-tab-bg" class="active">Background</li>
                        <li data-tab="#slider-tab-content">Content</li>
                        <li data-tab="#slider-tab-settings">Settings</li>
                    </ul>

                    <!-- Slide background tab -->
                    <div id="slider-tab-bg" class="wpus-slider-tab-content show">

                        <!-- Background Image -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Background Image', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Upload image for the gallery.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'background_image' ); ?>
                                <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_id' ) ); ?>
                                <?php $mb->the_field( 'bg_src' ); ?>
                                <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_src' ) ); ?>
                                <div class="wpus-mediawrap">
                                    <span>
                                        <img src="<?php $mb->the_value(); ?>" alt="" />
                                        <i class="wpus-del-media dashicons dashicons-no-alt"></i>
                                    </span>
                                </div>
                                <div class="wpus-media-button-wrap">
                                    <?php echo $wpalchemy_media_access->getButton(); ?>
                                </div>
                                <br>
                                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Background Image Settings', 'adamas' ); ?></a>
                                <?php
                                $settings_prefix = '';
                                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/background_settings.php';
                                ?>
                            </div>
                        </div>

                        <!-- Hero YouTube URL -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'YouTube URL', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Enter YouTube URL.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'youtube_url' ); ?>
                                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Enter youtube URL..." />
                            </div>
                        </div>

                        <!-- Hero Background Color -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Background Color', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Select header background color.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'background_color' ); ?>
                                <input class="wpus-colorpicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                            </div>
                        </div>

                        <!-- Hero Overlay Color -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Overlay Color', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Select header overlay color.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'overlay_color' ); ?>
                                <input class="wpus-colorpicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
                            </div>
                        </div>

                    </div>

                    <!-- Slide content tab -->
                    <div id="slider-tab-content" class="wpus-slider-tab-content">

                        <!-- Slide Title -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Slide Title', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Enter the slide title.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'title' ); ?>
                                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Slide title text..." />
                                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Title Settings', 'adamas' ); ?></a>
                                <?php
                                $settings_prefix = $settings_title = '';
                                $settings_title  = esc_html__( 'Title', 'adamas' );
                                $settings_prefix = 'title_';
                                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/text_settings.php';
                                ?>
                            </div>
                        </div>

                        <!-- Slide Description -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Slide Description', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Enter the slide description.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'desc' ); ?>
                                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Slide description text..." />
                                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Description Settings', 'adamas' ); ?></a>
                                <?php
                                $settings_prefix = $settings_title = '';
                                $settings_title  = esc_html__( 'Description', 'adamas' );
                                $settings_prefix = 'desc_';
                                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/text_settings.php';
                                ?>
                            </div>
                        </div>

                        <!-- Slide Button -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Slide Button', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Config slide button.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Button Text:', 'adamas' ) ?></span>
                                <?php $mb->the_field( 'button_text' ); ?>
                                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Slide button text..."/>
                                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Button Settings', 'adamas' ); ?></a>
                                <?php
                                $settings_prefix = '';
                                $settings_prefix = 'button_';
                                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/button_settings.php';
                                ?>
                            </div>
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Button URL:', 'adamas' ) ?></span>
                                <?php $mb->the_field( 'button_url' ); ?>
                                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Slide button URL..."/>
                            </div>
                        </div>

                        <!-- Slide Image -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Slide Image', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Upload image for the gallery.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'image' ); ?>
                                <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_id' ) ); ?>
                                <?php $mb->the_field( 'image_src' ); ?>
                                <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_src' ) ); ?>
                                <div class="wpus-mediawrap">
                                    <span>
                                        <img src="<?php $mb->the_value(); ?>" alt="" />
                                        <i class="wpus-del-media dashicons dashicons-no-alt"></i>
                                    </span>
                                </div>
                                <div class="wpus-media-button-wrap">
                                    <?php echo $wpalchemy_media_access->getButton(); ?>
                                </div>
                                <br>
                                <a href="#" class="wpus-popup-link"><?php esc_html_e( 'Image Settings', 'adamas' ); ?></a>
                                <?php
                                $settings_prefix = 'image_';
                                include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/image_settings.php';
                                ?>
                            </div>
                        </div>

                    </div>

                    <!-- Slides settings tab -->
                    <div id="slider-tab-settings" class="wpus-slider-tab-content">

                        <!-- Content Align -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Content Align', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Select content align.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'align' ); ?>
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

                        <!-- Arrows Color -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Arrows Color', 'adamas') ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Select arrows color.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'arrows_color' ); ?>
                                <div class="wpus-select-field">
                                    <select name="<?php $mb->the_name(); ?>">
                                        <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Default', 'adamas' ); ?></option>
                                        <option value="arrows-light" <?php $mb->the_select_state( 'arrows-light' ); ?>><?php esc_html_e( 'Light', 'adamas' ); ?></option>
                                        <option value="arrows-dark" <?php $mb->the_select_state( 'arrows-dark' ); ?>><?php esc_html_e( 'Dark', 'adamas' ); ?></option>
                                        <option value="arrows-gray" <?php $mb->the_select_state( 'arrows-gray' ); ?>><?php esc_html_e( 'Gray', 'adamas' ); ?></option>
                                        <option value="arrows-accent" <?php $mb->the_select_state( 'arrows-accent' ); ?>><?php esc_html_e( 'Accent Color', 'adamas' ); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Dots Color -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Dots Color', 'adamas') ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Select dots color.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <?php $mb->the_field( 'dots_color' ); ?>
                                <div class="wpus-select-field">
                                    <select name="<?php $mb->the_name(); ?>">
                                         <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Default', 'adamas' ); ?></option>
                                        <option value="dots-light" <?php $mb->the_select_state( 'dots-light' ); ?>><?php esc_html_e( 'Light', 'adamas' ); ?></option>
                                        <option value="dots-dark" <?php $mb->the_select_state( 'dots-dark' ); ?>><?php esc_html_e( 'Dark', 'adamas' ); ?></option>
                                        <option value="dots-gray" <?php $mb->the_select_state( 'dots-gray' ); ?>><?php esc_html_e( 'Gray', 'adamas' ); ?></option>
                                        <option value="dots-accent" <?php $mb->the_select_state( 'dots-accent' ); ?>><?php esc_html_e( 'Accent Color', 'adamas' ); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Parallax -->
                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Parallax', 'adamas' ) ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Choose a scrolling effect for the background.', 'adamas' ) ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <div class="wpus-select-field">
                                    <?php $mb->the_field( 'parallax' ); ?>
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
                                    <?php $mb->the_field( 'fade_content' ); ?>
                                    <select name="<?php $mb->the_name(); ?>">
                                        <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'No', 'adamas' ); ?></option>
                                        <option value="yes" <?php $mb->the_select_state( 'yes' ); ?>><?php esc_html_e( 'Yes', 'adamas' ); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- #wpus-slider-metabox-inside -->

            <?php $mb->the_group_close(); ?>
        <?php endwhile; ?>
        <p class="footer-boutom">
            <a class="docopy-items button"><?php esc_html_e( 'Add New Slide', 'adamas') ?></a>
            <input type="submit" class="button button-primary" name="save" value="Save">
        </p>
    </div>
    <!-- SLIDES: END -->

</div><!-- .wpus-meta-box -->

<script>
    jQuery(function($){

        var $documen = $(document);

        // Slider Sortable
        $('#wpa_loop-items').sortable({
            placeholder: 'wpus-slider-highlight',
            handle: '.shandle',
        });

        // Hide Slider Height
        $('#wpus_slider_meta_data_metabox').on('click', '#slider-full-screen', function() {
            $('#wpus--slider-height').slideUp();
        });

        // Show Slider Height
        $('#wpus_slider_meta_data_metabox').on('click', '#slider-boxed, #slider-full-width', function() {
            $('#wpus--slider-height').slideDown();
        });

        // Hide Slider Max Width
        $('#wpus_slider_meta_data_metabox').on('click', '#slider-boxed, #slider-full-screen', function() {
            $('#wpus--slider-max-width').slideUp();
        });

        // Show Slider Max Width
        $('#wpus_slider_meta_data_metabox').on('click', '#slider-full-width', function() {
            $('#wpus--slider-max-width').slideDown();
        });

        // Arrows Show / Hide
        $documen.bind('change', 'select[name="adamas_slider_meta_data[arrows]"]', function() {
            var val = $('select[name="adamas_slider_meta_data[arrows]"]').val();
            if (val === 'no' ) {
                $('div[id^=wpus--arrows-]').hide();
            } else {
                $('div[id^=wpus--arrows-]').show();
            }
        }).trigger('change');

        // Dots Show / Hide
        $documen.bind('change', 'select[name="adamas_slider_meta_data[dots]"]', function() {
            var val = $('select[name="adamas_slider_meta_data[dots]"]').val();
            if (val === 'no') {
                $('div[id^=wpus--dots-]').hide();
            } else {
                $('div[id^=wpus--dots-]').show();
            }
        }).trigger('change');

    });
</script>
