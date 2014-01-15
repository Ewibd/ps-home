<?php if(pagelines('featureboxes', $post->ID) && VPRO) get_template_part('pro/template_fboxes');?>

<?php 
	// variables pour la récup des custom fields settées en dehors du loop histoire de les avoir dans le bon scope. 
	$page_content = ""; 
	
?>

<div id="content">
	<div class="postwrap fix">
		<div class="post-1321 page type-page status-publish hentry" id="post-1321">
				<div class="copy fix">
			<?php if (have_posts()) :
						   		while (have_posts()) :
						      	the_post();
						      	//the_title();
						      	$page_content = get_post_meta($post->ID, 'page_html_content', true);
						      	echo($page_content);
						      	the_content();
						      	echo("<p>&nbsp;</p>");
						      	//the_content_rss();
						   		endwhile;
								endif;
								edit_post_link(__('Edit',TDOMAIN), '&nbsp;', ''); ?>
			</div> <!-- end content -->
		</div>		
	</div>
</div>

<!-- End Standard Page -->