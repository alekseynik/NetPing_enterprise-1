<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NetPing_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php if (is_front_page()) : ?>
		<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi69_0WB_xhT0XCVjLMQdI0PRJlAAO8IU&callback=initMap&libraries=&v=weekly"
		defer
		></script>
		<script>
		// Initialize and add the map
		function initMap() {
			// The location of Uluru
			const netping = { lat: 55.754045, lng: 37.749180 };
			// The map, centered at Uluru
			const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 16,
			center: netping,
			disableDefaultUI: true,
			});
			// The marker, positioned at Uluru
			const marker = new google.maps.Marker({
			position: netping,
			map: map,
			});
		}
		</script>
	<?php endif ?>
	
	<!-- <script>
		window.addEventListener('scroll', () => { 
			document.body.style.setProperty('--scroll',window.pageYOffset / (document.	body.offsetHeight - window.innerHeight));
		}, false);
	</script> -->


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'netping' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-bar">
			<div class="col-full">
				<div class="header-bar-container">
					<div class="header-bar-block">Отдел продаж: <a href="mailto:sale@netping.ru">sale@netping.ru</a></div>
					<div class="header-bar-block">Техподдержка: <a href="mailto:support@netping.ru">support@netping.ru</a></div>
					<div class="header-bar-block">Телефон: <a href="tel:+74956468537">+7 / 495 / 646-85-37</a></div>
					<div class="header-bar-block"></div>
				</div>
			</div>
		</div>
		<div class="trans-header">
			<div class="col-full">
				<div class="row">
					<div class="site-branding">
						<?php
						the_custom_logo();
	
						$netping_description = get_bloginfo( 'description', 'display' );
						if ( $netping_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $netping_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
			
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								// 'before'         => '<div class="flex-wrapper">',
								'after'          => '<div class="item-toggle">></div>',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
