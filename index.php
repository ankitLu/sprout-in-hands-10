<?php get_header(); ?>
<div id="content">
	<div id="left">
<!-- the loop -->

<?php if (have_posts()) :?>
<?php $postCount=0; ?>
<?php while (have_posts()) : the_post();?>
<?php $postCount++;?>

<div class="post" id="post-<?php the_ID(); ?>">

<p class="thedate"><?php the_time('l, F jS, Y') ?></p>

<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="h3"><?php the_title(); ?></a></h3>

<?php the_content('Read the rest of this entry &raquo;'); ?>


<div class="meta"><p>Posted by <?php the_author() ?> | Filed in <?php the_category(', ') ?> | <?php comments_popup_link('Comment now &#187;', '1 Comment &#187;', '% Comments &#187;', 'commentslink'); ?> <?php edit_post_link('edit','<span class="metaedit">| [',']</span>'); ?> </p></div>


</div>
	
<?php endwhile; ?>

		<div class="navigation">
			<?php posts_nav_link(' | ','&laquo; Previous Page' ,'Next Page &raquo;'); ?>
		</div>
		
<?php else : ?>

<h3>Not Found</h3>
<div class="entrybody">Sorry, but you are looking for something that isn't here.</div>
<?php endif; ?>

<!-- end loop -->

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>
<br />
</body>
</html>