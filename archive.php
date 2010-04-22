<?php get_header(); ?>

	<h2 class="archive">

<?php	$post = $posts[0];
	
	if (is_category()) {
	
		echo '&#8216;'; single_cat_title(); echo '&#8217;';
		
	} elseif (is_tag()) {
	
		echo '&#8216;'; single_tag_title(); echo '&#8217;';
		
	} elseif (is_day()) {
	
		the_time('F jS, Y');
	
	} elseif (is_month()) {

		the_time('F, Y');
	
	} elseif (is_year()) {
	
		the_time('Y');
	
	} elseif (is_author()) { ?>

		Author Archive
	
<?php	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {

?>		Blog Archives

<?php	} ?>

	</h2>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article>
	
		<header>

		<h2 id="post-<?php the_ID(); ?>">
		
			<!-- <a href="<?php the_permalink() ?>" rel="bookmark"> --><?php the_title(); ?><!-- </a> -->
		
			<section class="category"><?php the_category(',') ?><?php if ( the_tags('<p>Tagged with ', ', ', '</p>') ) ?></section>
		
		</h2>
		<time><?php the_time('F jS, Y'); ?> <?php _e("at"); ?> <?php the_time('g:i a'); ?></time>
		
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