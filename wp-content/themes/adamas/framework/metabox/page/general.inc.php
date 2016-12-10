<?php 
/**
 * Page Meta Box: General
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<div id="tab-general" class="wpus-tab-content">

    
    <?php if ( 'page' == $screen->id ) : ?>
        <!-- Page Layout -->
        <div class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Layout', 'adamas') ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Select layout for this page.', 'adamas') ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'page_layout' ); ?>
                <div class="wpus-image-field">
                    <input type="radio" id="wpus--no-sidebar" name="<?php $mb->the_name(); ?>" value="no-sidebar"<?php echo ( $mb->is_value( '' ) || $mb->the_radio_state( 'no-sidebar' ) ) ? 'checked="checked"' : ''; ?>/>
                    <label for="wpus--no-sidebar"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/1cl.png'); ?>" alt="" /></label>
                    <input type="radio" id="wpus--left-sidebar" name="<?php $mb->the_name(); ?>" value="left-sidebar"<?php $mb->the_radio_state( 'left-sidebar' ); ?>/>
                    <label for="wpus--left-sidebar"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/2cl.png'); ?>" alt="" /></label>
                    <input type="radio" id="wpus--right-sidebar" name="<?php $mb->the_name(); ?>" value="right-sidebar"<?php $mb->the_radio_state( 'right-sidebar' ); ?>/>
                    <label for="wpus--right-sidebar"><img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . ( '/images/2cr.png'); ?>" alt="" /></label>
                </div>
            </div>
        </div>
        <?php echo $mb->is_value( 'left-sidebar' )  ? '<style>#wpus--page-sidebar{display:block}</style>' : ''; ?>
        <?php echo $mb->is_value( 'right-sidebar' ) ? '<style>#wpus--page-sidebar{display:block}</style>' : ''; ?>
    <?php endif; ?>

    <?php if ( 'page' == $screen->id ) : ?>
        <!-- Sidebar -->
        <div id="wpus--page-sidebar" class="wpus-row">
            <div class="wpus-col-md-4">
                <span class="wpus-label"><?php esc_html_e( 'Select Sidebar', 'adamas' ) ?></span>
                <span class="wpus-desc"><?php esc_html_e( 'Select the sidebar you wish to display on this page.', 'adamas' ) ?></span>
            </div>
            <div class="wpus-col-md-8">
                <?php $mb->the_field( 'page_sidebar' ); ?>
                <div class="wpus-select-field">
                    <select name="<?php $mb->the_name(); ?>">
                        <option value="default"<?php $mb->the_select_state( 'default' ); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                        <?php foreach ( AdamasShared::sidebars() as $key => $value ) : ?>
                            <option value="<?php echo $key; ?>"<?php $mb->the_select_state( $key ); ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="wpus-desc"><?php esc_html_e( 'Shows only if layout with sidebar is selected.', 'adamas') ?></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Transparent Header -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Transparent Header', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select the transparent header style.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'transparent_header' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="transparent-light" <?php $mb->the_select_state( 'transparent-light' ); ?>><?php esc_html_e( 'Transparent Light', 'adamas'); ?></option>
                    <option value="transparent-light has-border" <?php $mb->the_select_state( 'transparent-light has-border' ); ?>><?php esc_html_e( 'Transparent Light With Border', 'adamas'); ?></option>
                    <option value="transparent-dark" <?php $mb->the_select_state( 'transparent-dark' ); ?>><?php esc_html_e( 'Transparent Dark', 'adamas'); ?></option>
                    <option value="transparent-dark has-border" <?php $mb->the_select_state( 'transparent-dark has-border' ); ?>><?php esc_html_e( 'Transparent Dark With Border', 'adamas'); ?></option>
                </select>
            </div>
        </div>
    </div>

    <!-- Top Bar -->
    <div id="wpus--top-bar" class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Top Bar', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enabling this option will show top bar area.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'top_bar' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>

    
    <?php if ( 'product' != $screen->id ) : ?>
    <!-- Header Box Shadow -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Header Box Shadow', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable / Disable the header box shadow.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'header_box_shadow' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>

    <!-- Header Box Shadow -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Header Border', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable / Disable the header border.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'header_border' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>
    <?php endif; ?>

</div>