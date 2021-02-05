<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Super_Ultra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<figure class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
	</figure>
	<div class="post-content-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<?php superultra_posted_on(); ?>
				<?php superultra_entry_meta(); ?>
			</div>
			<h2 class="entry-title" itemprop="headline">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</h2>
		</header>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>
		<?php $latest_readmore_text= superultra_get_option('latest_readmore_text'); ?>
		<?php if (!empty($latest_readmore_text)): ?>		
			<footer class="entry-footer">
				<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php echo esc_html($latest_readmore_text); ?></a>
			</footer>
		<?php endif ?>
	</div>
</article>


