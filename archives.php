<?php
/*
Template Name: Extended Live Archives
*/
?>

<?php get_header(); ?>
<div id="content">
	<div id="left">

                        <div class="post"><!-- Post Div-->


                        <h3 class="storytitle" id="post-<?php the_ID(); ?>">
Live Archive                        </h3>

<p><?php _e("This is the frontpage of the <?php bloginfo('name'); ?> archives. Through here, you will be able to move down into the archives by way of time or category. If you are looking for something specific, perhaps you should try the searching from the home page.", "squible"); ?></p><br />
<?php if (function_exists('af_ela_super_archive')) {af_ela_super_archive();} ?> 


			<div style='clear: both;'></div>
			<br /><br />

                        </div><!-- End of post div-->


	</div>
	
</div>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
</div>
</body>
</html>