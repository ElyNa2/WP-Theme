<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Super_Ultra
 */

get_header();
?>
<div id="primary" class="content-area">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'super-ultra' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->
		<main id="primary" class="site-main">

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
		?>
		

		</main><!-- #main -->
	<?php endif; ?>
</div>
<?php
get_sidebar();
get_footer();
