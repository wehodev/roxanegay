<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) { 
	return;
}
?>

<form method="post" class="login" <?php if ( $hidden ) { echo 'style="display:none;"'; } ?>>
 	
    <h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
      
    <?php do_action( 'woocommerce_login_form_start' ); ?>
    
    <p><?php if ( $message ) { echo wptexturize( $message ); } ?></p>
    
    <p class="form-row">
        <label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="username" id="username" />
    </p>
    <p class="form-row">
        <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input class="input-text" type="password" name="password" id="password" />
    </p>
    
    <?php do_action( 'woocommerce_login_form' ); ?>
                
    <p class="form-actions">
        <?php wp_nonce_field( 'woocommerce-login' ); ?>
        <input type="submit" class="button" name="login" value="<?php esc_html_e( 'Login', 'woocommerce' ); ?>" />
        <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
    </p>
    <p class="form-group">
        <input name="rememberme" type="checkbox" id="rememberme" class="input-checkbox" value="forever" />
        <label for="rememberme" class="inline"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></label>
        
        <span class="lost_password"><a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a></span>
    </p>

    <?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
