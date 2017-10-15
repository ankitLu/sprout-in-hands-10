<div id="sidebar">
<!-- begin sidebar -->
<div id="menu">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>

	 <li id="pages"><div class="cat"><?php _e('Pages'); ?></div>
		<ul>
			<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
		<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		</ul>
	 </li>

	<li id="categories"><div class="cat"><?php _e('Categories'); ?></div>
		<ul>
		<?php wp_list_cats(); ?>
		</ul>
	 </li>
 

	<?php if(is_home() && get_theme_option('teqvar_is_archive','Yes')=='Yes'){  ?>
		 <li id="archives"><div class="cat"><?php _e('Archives'); ?></div>
 			<ul>
			 <?php wp_get_archives('type=monthly'); ?>
 			</ul>
 		</li>	
	<?php }?>


	<?php if( get_theme_option('teqvar_is_calendar','Yes')=='Yes'){  ?>
		 <li id="calendar"><div class="cat"><?php _e('Calendar'); ?></div>
		 	<ul>
 		 	<?php get_calendar(); ?>
		 	</ul>
 		</li>	
	<?php }?>

	<?php if( is_home() && get_theme_option('teqvar_is_links','Yes')=='Yes'){  ?>
		 <li id="links"><div class="cat"><?php _e('Links'); ?></div>
			<ul>
			 <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, TRUE, -1, TRUE); ?>
			</ul>
		 </li>
	<?php }?>

<?php endif; ?>

  <li id="meta"><div class="cat"><?php _e('Meta'); ?></div>
 	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://greatwordpressthemes.com">Make Wordpress Themes</a></li>
		<?php wp_meta(); ?>
	</ul>
 </li>

 <li id="search">
 		<div>
 	<?php _e('Search'); ?>:
   	<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" id="s" name="s" class="searchbox" /><input type="submit" value="Go" class="searchbutton" />
	</form>
	</div>
 </li>

</ul>
</div>
<!-- end sidebar -->
</div>