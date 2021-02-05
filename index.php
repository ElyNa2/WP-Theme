<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Super_Ultra
 */

get_header();
?>
	<div id="content" class="site-content">
		<header class="page-header">
			<div class="container">
				<?php 
				$latest_posts_title = superultra_get_option('latest_posts_title');
				$latest_posts_subtitle = superultra_get_option('latest_posts_subtitle');
				 ?>
				<?php if( !empty($latest_posts_title)){ ?>
					<h1 class="page-title"><?php echo esc_html($latest_posts_title); ?></h1>
				<?php } ?>
				<?php if( !empty($latest_posts_subtitle)){ ?>
					<div class="page-desc">
						<?php echo esc_html($latest_posts_subtitle); ?>
					</div>
				<?php } ?>
			</div>
		</header>
			
	<div class="container">
	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<?php get_sidebar(); ?>
	
</div>

<?php

get_footer();
