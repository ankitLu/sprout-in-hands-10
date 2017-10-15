<?php get_header(); ?>
<div id="content">
	<div id="left">
	
<!-- the loop -->
<div class="post">

			<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>				
			<h3>Archive for the '<?php echo single_cat_title(); ?>' Category </h3>
			
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h3>Archive for <?php the_time('F jS, Y'); ?></h3>
			
		 	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h3>Archive for <?php the_time('F, Y'); ?></h3>
	
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h3>Archive for <?php the_time('Y'); ?></h3>
			
			<?php /* If this is a search */ } elseif (is_search()) { ?>
			<h3>Search Results</h3>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h3>Author Archive</h3>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h3>Blog Archives</h3>
	
			<?php } ?>



		 	<?php while (have_posts()) : the_post(); ?>
				<p class="thedate"><?php the_time('l, F jS, Y') ?></p>
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="h3"><?php the_title(); ?></a></h3> 
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<div class="meta"><p>Posted by <?php the_author() ?> | Filed in <?php the_category(', ') ?> | <?php comments_popup_link('Comment now &#187;', '1 Comment &#187;', '% Comments &#187;', 'commentslink'); ?></p></div>
			<?php endwhile; ?>

		
		<div class="navigation">
			<?php posts_nav_link(' | ','&laquo; Previous Page' ,'Next Page &raquo;'); ?>
		</div>
	
	<?php else : ?>

		<h1>Not Found</h1>

	<?php endif; ?>



</div>

<!-- end loop -->


</div>
	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
</div>
</body>
</html>
