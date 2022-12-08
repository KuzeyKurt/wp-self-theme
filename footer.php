<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qasaba
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p><?=date('Y') ?> | All rights reserved. </p>
		</div><!-- .site-info -->

<div>

	<nav class="footer-navigation"> 	
<button class="menu-toggle" aria-controls="footer-menu" aria-expanded="false"><?php esc_html_e( 'Footer Menu', 'qasaba' ); ?></button>
	<?php wp_nav_menu( 
		array(
			'theme_location' => 'footer-menu',
			'menu_id'        => 'footer-menu',
			'container_class' => 'footerred',
		)
	) ?>
	</nav>
</div>

		<div class="logo">         
   <?php the_custom_logo(); ?>     
  </div> <!-- custom logo -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<menu>
	
</menu>

</body>
</html>
