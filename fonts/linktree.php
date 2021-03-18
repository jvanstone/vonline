<?php
/**
 * Template Name: Linktree
 *
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 *
 */

get_header();
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large is-resized"><img src="https://www.vanstoneonline.com/wp-content/uploads/2020/12/VanstoneOnline-Logo.jpg" alt="Logo for Vanstone Online" class="wp-image-96" width="232" height="232" title="image avatar"/></figure></div>
<h4 class="has-text-align-center"><strong><span style="color:#6f7071" class="has-inline-color">@VanstoneOnline</span></strong></h4>
<p class="has-text-align-center">Digital Marketing and Website Development.<br>Creating brands via Email and Web.<br>Super fan of PHP, CSS &amp; HTML.</p>
<?php


// The Query.
query_posts( 'posts_per_page=6' );
 
?>
<article>
<h1 class="top6Head">My latest posts!</h1>

<div class="top6">
<?php
// The Loop
while ( have_posts() ) : the_post();
?>

<div class="topItem">
<?php echo get_the_post_thumbnail( $_post->ID, 'remove_thumbnail_width_height' ); ?>
<button class="top6-button" ><span><a href="<?php echo esc_url( get_permalink(), 'vonline' ); ?>">
	<?php the_title(); ?>
	</a></span></button></div>
 
<?php
endwhile;

// Reset Query
wp_reset_query();
?>
</div>
</article>
<div id="linktree">
<h2>Connect...</h2>
<a href="mailto:jason@vanstoneonline.com"><i class="fas fa-envelope"></i> Email</a>
<a href="https://twitter.com/VanstoneOnline" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></i> Twitter</a>
<a href="https://www.instagram.com/VanstoneOnline/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram-square"></i> Instagram</a>
<a href="https://www.facebook.com/VanstoneOnline/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i> Facebook</a>
<a href="https://www.linkedin.com/in/jason-vanstone-ca/ target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i> Linked In</a>
<!-- <a href="https://www.vanstoneonline.com/newsletter/">Join the Newsletter</a> -->
<h2>Portfolio...</h2>
<a href="https://www.brizyamps.com/" target="_blank" rel="noopener noreferrer">Brizy Amps</a>
<a href="https://www.lisaskitchen.com/home" target="_blank" rel="noopener noreferrer">Lisa Shamai Cuisinière</a>
<a href="https://jasonvanstone.com/" target="_blank" rel="noopener noreferrer">Vanstone Music</a>
<a href="https://www.vanstoneonline.com/amp/Graffiti-Alley/" target="_blank" rel="noopener noreferrer">Graffiti Alley</a>
<a href="https://github.com/jvanstone" target="_blank" rel="noopener noreferrer">GitHub</a>
</div>
</main><!-- #main -->
	</div><!-- #primary -->
<?php

get_footer();
