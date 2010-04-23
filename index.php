<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article>
	
		<header>

		<h2 id="post-<?php the_ID(); ?>">
		
			<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
		
			<time><?php the_time('F jS, Y'); ?> <?php _e("at"); ?> <?php the_time('g:i a'); ?></time>
			
			<section><?php the_category(','); the_tags('', ', ', '') ?></section>
		
		</h2>
		
		</header>

		<?php the_content('Read the rest of this entry &raquo;'); ?>

		<?php if ( comments_open() ) comments_template(); ?>

	</article>

	
	
	
	
	<?php endwhile; else: ?>
	
		<p>Sorry, but you are looking for something that isn't here.</p>
	
	<?php endif; ?>





	<nav>
	
		<?php next_posts_link('&laquo; Older Entries') ?>
		<?php previous_posts_link('Newer Entries &raquo;') ?>
	
	</nav>

<?php get_sidebar(); ?>
<?php get_footer(); ?>