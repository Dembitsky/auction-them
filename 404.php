<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package auction-them
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="error">
				<div class="error__wrapper">
					<div class="error__item">
					<?php echo '<img src="'. get_template_directory_uri().'/img/error.png" alt="404">';?>
					</div>
					<div class="error__item">
						<h1>404</h1>
						<div class="error__text">Šāda saite netika atrasta! Iespējams te bija izsole, iespējams nē!
						Ja uzskati, ka šai saitei būtu jāstrādā lūdzu 
						<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">sazinies ar mums</a></div>
						<div class="error__btn"><a href="<?php echo wp_login_url() ?>">Uz sākuma lapu</a></div>
					</div>
				</div>
			</div>
		</div>
			


	</main><!-- #main -->

<?php
get_footer();
