<?php get_header(); ?>
<div id="content">
	<div id="left">
	
<!-- the loop -->

<?php if (have_posts()) :?>
<?php $postCount=0; ?>
<?php while (have_posts()) : the_post();?>
<?php $postCount++;?>

<div class="post" id="post-<?php the_ID(); ?>">

<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3> 

<?php the_content('Read the rest of this entry &raquo;'); ?>

</div>
	
<?php endwhile; ?>
		
<?php else : ?>

<h3>Not Found</h3>
<div class="entrybody">Sorry, but you are looking for something that isn't here.</div>
<?php endif; ?>

<!-- end loop -->

</div>
	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
	
</div>

</body>
</html>