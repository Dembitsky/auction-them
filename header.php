<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auction_wp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
    <header class="header">
        <div class="container">
			<div class="nav">
				<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
					?>
					<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
				else :
					?>
					<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

				<?php endif; ?>
		
				<?php
					wp_nav_menu(
					array(
						'theme_location' => 'menu-header',
						'container'      => false,
						'items_wrap'      => '<ul class="nav__list">%3$s</ul>',
					)
				);
					if ( is_user_logged_in() ) {
						$current_user = wp_get_current_user();
          				$username = $current_user->display_name;
						echo '<div class="header__loger">';
						echo '<a href="'.  wc_get_page_permalink( 'myaccount' ).'"><img src="'. get_template_directory_uri().'/img/auction.png" alt="rf,bytn "></a>';
						echo '<div class="header_user">'. $username . '</div>';
						echo '<a href="'.wp_logout_url().'"><img src="'. get_template_directory_uri().'/img/logout.png" alt="выйти с аккаунта"></a>';
						echo '</div>';
					}
					else {
						?>
						<button id="btn-nav" class="nav__btn">Pieslēgšanās pircējiem</button>
						<div class="login_pop">
							<button id="closed" class="closed">x</button>
							<form name="loginform" id="loginform" action="/wp-login.php" method="post">
							<h3>Pieslēgšanās</h3>
                        		<input type="text" name="log" id="user_login" class="mail" placeholder="E-pasta adrese">
                        		<input name="pwd" id="user_pass" class="pass" type="password" placeholder="Parole">
                       			 <a href="#" class="pass-relo">Aizmirsta parole</a>
                            	<input type="submit" name="wp-submit" id="wp-submit" class="btn__oke">
								
                        		<p class="pass__rename">Nav profils?<a href="<?php echo get_permalink(127);  ?>" title="Reģistrējies">Reģistrējies</a> </p>

								<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Запомнить меня</label></p>

							</form>
						</div>	
						<?php
					}
				?>
				

			</div>
		</div>
	</header>
	<div class="header__mob">
		<div class="nav__mob">
			<div class="mob__logo">
				<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
					?>
					<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
				else :
					?>
					<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

				<?php endif; ?>
			</div>
			<div class="mob__btn">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div class="mob__menu">
			<div class="mob__login">
			<?php 
										if ( is_user_logged_in() ) {
											$current_user = wp_get_current_user();
											  $username = $current_user->display_name;
											echo '<div class="header__loger">';
											echo '<a href="'.  wc_get_page_permalink( 'myaccount' ).'"><img src="'. get_template_directory_uri().'/img/auction.png" alt="rf,bytn "></a>';
											echo '<div class="header_user">'. $username . '</div>';
											echo '<a href="'.wp_logout_url().'"><img src="'. get_template_directory_uri().'/img/logout.png" alt="выйти с аккаунта"></a>';
											echo '</div>';
										}
										else {
											?>
											<button id="btn-nav" class="nav__btn">Pieslēgšanās pircējiem</button>
											<div class="login_pop">
												<button id="closed" class="closed">x</button>
												<form name="loginform" id="loginform" action="/wp-login.php" method="post">
												<h3>Pieslēgšanās</h3>
													<input type="text" name="log" id="user_login" class="mail" placeholder="E-pasta adrese">
													<input name="pwd" id="user_pass" class="pass" type="password" placeholder="Parole">
														<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="pass-relo">Aizmirsta parole</a>
													<input type="submit" name="wp-submit" id="wp-submit" class="btn__oke" 	>
													
													<p class="pass__rename">Nav profils?<a href="<?php echo get_permalink(127);  ?>" title="Reģistrējies">Reģistrējies</a> </p>
					
													<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Запомнить меня</label></p>
					
												</form>
											</div>
											<div class="mob_close">X</div>
										</div>
											<?php
										}
						wp_nav_menu(
							array(
								'theme_location' => 'menu-mobil',
								'container'      => false,
								'items_wrap'      => '<ul class="mob__list">%3$s</ul>',
							)
							);
			?>
		</div>	
	</div>


