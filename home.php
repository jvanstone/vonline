<?php
/**
 * Template Name: VO-Landing-Page
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 
 

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php vonline_do_schema( 'html' ); ?>>
<?php wp_body_open(); ?>

<?php do_action('vonline_before_site'); //Hooked: vonline_preloader() ?>
<div class="container-fluid mb-10">
			<div class="container-xxl offset-1">
				<header class="landing-header">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<nav class="navbar navbar-expand-lg navbar-light " role="navigation"> 
							<div class="navbar-header">
							<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			   
							</div>
							<button class="navbar-toggler m-2" type="button" data-toggle="collapse" data-target="#homeMenu" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
								</button>
							<div class="collapse navbar-collapse" id="homeMenu">
							<?php wp_nav_menu( array( 
												'theme_location' => 'landing-page', 
												'menu_class' => 'navbar-nav',
												'add_li_class' => 'nav-item',
												'container' => false 
												) 
											 ); ?>
<!--                                 <button type="button" class="btn btn-orange m-1" href="#">Login</button>
 -->                            </div>
						</nav>
					</div>
				</header>
				<main class="landing-page">
					<h1 class="display-5">WordPress Development <br>& Web Design</h1>
					<div class="row icons">
						<div class="col-md-3 m-3 icon">
							<div class="row">
								<img src="<?php echo get_template_directory_uri(); ?>/images/figma.svg" alt="Figma" />
								<div class="icon--info">
									<p class="col icon-top">Figma</p>
									<p class="col icon-bottom">DRAW</p>
								</div>
							</div>
						</div> <!--enc col icon -->
						<div class="col-md-3 m-3 icon">
							<div class="row">
								<img src="<?php echo get_template_directory_uri(); ?>/images/BootStrap.svg" alt="Bootstrap" />
								<div class="icon--info">
									<p class="col icon-top">Bootstrap</p>
									<p class="col icon-bottom">SCSS</p>
								</div>
							</div>
						</div>  <!--enc col icon -->
						<div class="col-md-3 m-3 icon">
							<div class="row">
								<img src="<?php echo get_template_directory_uri(); ?>/images/WordPress.svg" class="img-fluid" alt="WordPress" />
								<div class="icon--info">
									<p class="col icon-top">WordPress</p>
									<p class="col icon-bottom">CMS</p>
								</div>
							</div>
						</div>  <!--enc col icon -->
					</div>
				</main>
				<footer class="landing-footer row">
					<div class="col-sm media m-md-4 feature my-auto">
						<img src="<?php echo get_template_directory_uri(); ?>/images/theme.jpg" alt="Custom Themes" class="m-1 rounded" />
						<div class="media-body m-1 feature--info">
							<p>Custom Themes</p>
						</div>
					</div>
					<div class="col-sm media m-md-4 feature my-auto">
						<img src="<?php  echo get_template_directory_uri(); ?>/images/plugin.jpg" alt="Custom Themes" class="m-1 rounded" />
						<div class="media-body m-1 feature--info ">
							<p>Custom Plugins</p>
						</div>
					</div>
					<div class="col-sm m-3 p-1">
						<button class="btn btn-primary m-1" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							Connect
						</button>
						<div class="collapse" id="collapseExample">
							<div class="card card-body text-white bg-dark mb-3">
								<div class="row justify-content-around">
									<a href="https://vanstoneonline.com/contact-us/"><span class="iconify" data-inline="false" data-icon="ic:baseline-alternate-email" style="font-size: 24px;"></span></a>
									<a href="https://twitter.com/VanstoneOnline"><span class="iconify" data-inline="false" data-icon="jam:twitter-circle" style="font-size: 24px;"></span> </a>
									<a href="https://www.instagram.com/VanstoneOnline/"><span class="iconify" data-inline="false" data-icon="akar-icons:instagram-fill" style="font-size: 24px;"></span></a>
									<a href="https://github.com/jvanstone"><span class="iconify" data-inline="false" data-icon="ant-design:github-filled" style="font-size: 24px;"></span></a>
									<a href="https://www.facebook.com/VanstoneOnline/"><span class="iconify" data-inline="false" data-icon="jam:facebook-circle" style="font-size: 24px;"></span></a>
									<a href="https://www.linkedin.com/in/jason-vanstone-ca/"><span class="iconify" data-inline="false" data-icon="typcn:social-linkedin-circular" style="font-size: 26px;"></span></a>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>

<?php get_footer(); ?>
