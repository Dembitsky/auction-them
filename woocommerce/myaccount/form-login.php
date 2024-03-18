<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
	<div class="login__title">Pieslēgšanās</div>
			<form class="login__form" method="post">
				
				<?php do_action( 'woocommerce_login_form_start' ); ?>
				
	
				<div class="woo__login">
					<label for="username"><?php esc_html_e( 'E-pasta adrese', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>
				<div class="woo__login">
					<label for="password"><?php esc_html_e( 'Parole', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
				</div>
	
				<?php do_action( 'woocommerce_login_form' ); ?>
	
				<div class="woo__login">
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Prisimink mane', 'woocommerce' ); ?></span>
					</label>
				</div>
				<div class="woo__submit">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Pieslēgties', 'woocommerce' ); ?>"><?php esc_html_e( 'Pieslēgties', 'woocommerce' ); ?></button>
				</div>
					
				
				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Aizmirsta parole', 'woocommerce' ); ?></a>
				</p>
	
				<?php do_action( 'woocommerce_login_form_end' ); ?>
	
			</form>
	
<?php endif; ?>




<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
