<?php
/*
Template Name: Live Sketching
*/
?>
<?php get_header(); ?>

<?php if(pagelines('featureboxes', $post->ID) && VPRO) get_template_part('pro/template_fboxes');?>

<?php 
	// variables pour la recup des custom fields settees en dehors du loop histoire de les avoir dans le bon scope. 

	$auto_refresh_oui_non = "";
	$intervalle_refresh_millisec = "";
	$chemin_image_avec_http_et_slash_final = ""; 
	$nom_image_avec_ext = "";
	$largeur_image_en_px ="";
	$alt_image = "";	
	
?>

<div id="content">
	<div class="postwrap fix">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php if (have_posts()) :
						   		while (have_posts()) :
						   			//recup des champs custom de la page
						   			$auto_refresh_oui_non = strtoupper(get_post_meta($post->ID, 'auto_refresh_oui_non', true));
										$intervalle_refresh_millisec = get_post_meta($post->ID, 'intervalle_refresh_millisec', true);
										$chemin_image_avec_http_et_slash_final = get_post_meta($post->ID, 'chemin_image_avec_http_et_slash_final', true);
										$nom_image_avec_ext = get_post_meta($post->ID, 'nom_image_avec_ext', true);
										$largeur_image_en_px = get_post_meta($post->ID, 'largeur_image_en_px', true);
										$alt_image = get_post_meta($post->ID, 'alt_image', true);
										//on pose le javascript: ?>  
										                                                                                               
<script language="JavaScript"><!--                                                                 
function refreshIt() {                                                                           
	if (!document.images) return;                                                                  
	document.images['imglive'].src = '<?php echo($chemin_image_avec_http_et_slash_final); ?><?php echo($nom_image_avec_ext); ?>?' + Math.random(); 
  <?php if ($auto_refresh_oui_non =="OUI") { ?>
	setTimeout('refreshIt()',<?php echo($intervalle_refresh_millisec); ?>); // refresh every <?php echo($intervalle_refresh_millisec/1000); ?> secs  
	<?php } ?>                                   
	}
//--></script>                                                                                     
						      	<?php                                                                                              
						      	//affichage de l'image:
						      	echo("<img src=\"http://www.podcastscience.fm/nico/1pixel.gif\" ");
						      	if ($auto_refresh_oui_non == "OUI") {echo("onLoad=\"setTimeout('refreshIt()',".$intervalle_refresh_millisec.")\" ");}
						      	echo("style=\"visibility:hidden\" />");
						      	echo("<img name=\"imglive\" src=\"".$chemin_image_avec_http_et_slash_final.$nom_image_avec_ext."\" ");
						      	echo("alt=\"".$alt_image."\" ");
						      	echo("width=\"".$largeur_image_en_px."\" ");
						      	echo("/>");
						      	echo("<p>&nbsp;</p>");
						      	the_post(); 
						      	the_content(); // contenu saisi dans l'éditeur
						   		endwhile;
								endif;
								edit_post_link(__('Edit',TDOMAIN), '&nbsp;', ''); ?>
			</div> <!-- /post_class -->
		</div>	<!-- /postwrap fix-->	
	</div> <!-- /content-->
</div>

<!-- End Standard Page -->


<?php get_footer(); ?>
