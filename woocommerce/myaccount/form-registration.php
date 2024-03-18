<?php
/**
 * register woo
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
?>

					
		
				<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
					<div class="wrapper__regs">
						<div class="reg-form">
						<div class="regform__item">		
							<div class="reg__title">
                        		<h3>Jūsu reģistrācijas dati</h3>
                   			 </div>
							<?php do_action( 'woocommerce_register_form_start' ); ?>
						
							<div class="reg__input">
								<label for="reg_username">Reģistrācijas nr.<span class="required">*</span></label>
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</div>
							<div class="reg__input">
								<label for="reg_email">E-pasta adrese <span class="required">*</span></label>
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</div>
							<div class="chetbox__register">
								<input  type="checkbox" class="input-text" name="billing_company" id="kind_of_c_name">
								<label for="kind_of_l_name">Apstiprinu, ka esmu izlasījis lietošanas noteikumus un piekrītu tiem</label>
							</div>
								<div class="chetbox__register">
									<input  type="checkbox" class="input-text" name="billing_company" id="kind_of_c_name">
									<label for="kind_of_l_name">Piekrītu mezsolis.lv privātuma politikai </label>
							</div>
							<div class="submit__registr">
								<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
								<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Reģistrēt profilu"><?php esc_html_e( 'Reģistrēt profilu', 'woocommerce' ); ?></button>
								<p> <span class="required">*</span>-Visa prasītā informācija ir jānorāda obligāti</p>
							</div>
		
						</div>
					
						<div class="item-pass">
							<h3>Parole</h3>
							<div class="inner__pass">
								<label for="reg_password">Ievadiet paroli<span class="required">*</span></label>
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
							</div>

							<p class="text__pass">Jums būs iespēja mainīt sava profila paroli</p>
						</div>
						
					<?php do_action( 'woocommerce_register_form' ); ?>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>
		</div>
