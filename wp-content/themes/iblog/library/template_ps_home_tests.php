<?php if(pagelines('featureboxes', $post->ID) && VPRO) get_template_part('pro/template_fboxes');?>

<?php 
	// variables pour la récup des custom fields settées en dehors du loop histoire de les avoir dans le bon scope. 
	$titre_zone_2 = ""; 
	$categorie_posts_zone_2 = "";
	$nombre_posts_zone_2 = "";
	$titre_zone_3 = ""; 
	$categorie_posts_zone_3 = "";
	$nombre_posts_zone_3 = "";  
	$titre_zone_3bis = "Dernières chroniques"; 
	$sous_titre_3bisa = "Blogs audio"; // blog audio
	$categorie_posts_zone_3bisa = "791"; 
	$nombre_posts_zone_3bisa = "3";  
	$sous_titre_3bisb = "Quizz Info/Intox"; // quizz
	$categorie_posts_zone_3bisb = "934"; 
	$nombre_posts_zone_3bisb = "3";  
	$sous_titre_3bisc = "Son de la semaine"; // son
	$categorie_posts_zone_3bisc = "762"; // son de la semaine
	$nombre_posts_zone_3bisc = "3";  
	$titre_zone_4 = ""; 
	$titre_illustrations = ""; 
	$categorie_illustrations = "";
	$nombre_illustrations = "";  
	$texte_promo_live = "";
	
?>

<div id="maincontent">
	<div id="content">
		
<!-- ZONE 1 MESSAGE BIENVENUE -->
		<div id="al_1st_line_container" style="position:relative; height:150px; overflow:hidden">
			<div style="position:absolute; left: 0; width: 58%;"><!-- texte intro -->
				<?php if (have_posts()) :
					   		while (have_posts()) :
					      	the_post();
					      	//the_title();
					      	the_content();
					      	//the_content_rss();
					      	$titre_zone_2 = get_post_meta($post->ID, 'titre_zone_2', true);
					      	$categorie_posts_zone_2 = get_post_meta($post->ID, 'categorie_posts_zone_2', true);
					      	$nombre_posts_zone_2 = get_post_meta($post->ID, 'nombre_posts_zone_2', true);
					      	$titre_zone_3 = get_post_meta($post->ID, 'titre_zone_3', true);
					      	$categorie_posts_zone_3 = get_post_meta($post->ID, 'categorie_posts_zone_3', true);
					      	$nombre_posts_zone_3 = get_post_meta($post->ID, 'nombre_posts_zone_3', true);
					      	$titre_zone_4 = get_post_meta($post->ID, 'titre_zone_4', true);
					      	$titre_illustrations = get_post_meta($post->ID, 'titre_illustrations', true);
					      	$categorie_illustrations = get_post_meta($post->ID, 'categorie_illustrations', true);
					      	$nombre_illustrations = get_post_meta($post->ID, 'nombre_illustrations', true);
					      	$texte_promo_live = get_post_meta($post->ID, 'texte_promo_live', true);	      	
					   		endwhile;
							endif;
							edit_post_link(__('Edit',TDOMAIN), '&nbsp;', ''); ?>	
			</div><!-- /texte intro -->
			<div style="background-color: #fff; position:absolute; right: 0; width: 38%; height: 130px; padding:10px; margin-left:10px; border:1px solid silver;"><!-- box live -->
							<!--<strong>S'abonner au podcast</strong>	<br />	<br />	<div class="textwidget">&raquo; <a style="color: #08C;" href="itpc://feeds.feedburner.com/PodcastScience" title="Abonnez-vous au podcast avec iTunes">Avec iTunes</u></a><br /> &raquo; <a style="color: #08C;"  href="http://feeds.feedburner.com/PodcastScience" target="_blank" title="Abonnez-vous au podcast via Feedburner avec votre agrégateur favori">Avec un autre agrégateur RSS</a><br /> &raquo; Par e-mail: <br /><div style="margin-left:10px"><form style="/*border:1px solid #ccc;padding:3px;text-align:center;*/" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=PodcastScience', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><input style="font-size:10px; width:130px;" type="text" name="email" onclick="this.select();" value="Votre adresse e-mail" /><input type="hidden" value="PodcastScience" name="uri"/><input type="hidden" name="loc" value="fr_FR"/><input style="margin-left:5px; font-size:10px; width:70px;" type="submit" value="S'abonner" /></form></div><br /></div>-->
							<div>
								<?php echo($texte_promo_live); ?>
							</div>
			</div><!-- / box live -->
	</div><!--al_1st_line_container">

<!-- /ZONE 1 -->		

<!-- ZONE 2 TEASER -->
<br />
<h3><?php echo($titre_zone_2); ?></h3>
	<div class="postwrap fix">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style="padding:10px;">
			<!-- afficher les posts de la catégorie 586: -->
<?php 
//code juan. Al: (commenté paged car je ne comprenais pas.)
  $cat = $categorie_posts_zone_2;
  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $post_per_page = $nombre_posts_zone_2; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'ASC',
    //'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); 
  if( have_posts() ) : 
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<h5 style="clear:both"><?php the_title(); ?></h5>
			<div class="entry" style="margin-bottom:20px;">
          <?php the_content('',TRUE,'#'); ?>
      </div>

    <?php endwhile; ?>

  <?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Pb, ce loop va chercher les posts de la catégorie déclarée dans le champ custom categorie_posts_zone_2 (valeur: <?php echo $categorie_posts_zone_2; ?>). Ya rien dedans?</p>
		<?php get_search_form(); ?>
	<?php endif; 
	
	$wp_query = $temp;  //reset back to original query
	

?>


		</div><!-- /post class -->

	</div><!-- /postwrap -->

<!-- /ZONE 2 -->


<!-- ZONE 3 dossiers -->
<br />
<h3 style="margin-top:20px"><?php echo($titre_zone_3); ?></h3>
	<div class="postwrap fix">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style="padding:10px;">

<?php 

  $cat = $categorie_posts_zone_3;
  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $post_per_page = $nombre_posts_zone_3; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'DESC',
    //'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); ?>
  <table width="100%"><tr>
  <STYLE type="text/css">
   .avatar {float: left; margin:0 2px 2px 0;} 
	</STYLE>

  <?php 
  if( have_posts() ) : 
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	   
        <!--h4 style="clear:both"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4-->
       	<td style="width:<?php echo(100/$nombre_posts_zone_3) ?>%; padding:5px;">
        		<?php echo get_avatar( get_the_author_email(), '50', 'http://www.podcastscience.fm/wp-includes/images/crystal/audio.png' ); ?>
        		<strong><?php the_author(); ?> : <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong>
        		<br /> <br />
        		<?php the_excerpt_rss() ?><br />
        		<a title="Voir les commentaires" href="<?php the_permalink() ?>#comments"><?php echo get_comments_number(); ?> commentaires</a><br />
        		
        		<!--?php echo "zruf".$meta_values = get_post_meta(the_post(), '_podPressMedia', $single); ?--> 
        </h6>
      </td>
<!-- métas: post.comment_count, postmeta.meta_key = _podPressMedia => postmeta.meta_value      -->

    <?php endwhile; ?>
	</tr></table>
  <?php else : ?>


		<h2 class="center">Not Found</h2>
		<p class="center">Pb, ce loop va chercher les posts de la catégorie déclarée dans le champ custom categorie_posts_zone_3 (valeur: <?php echo $categorie_posts_zone_3; ?>). Ya rien dedans?</p>
		<?php get_search_form(); ?>

	<?php endif; 
	
	$wp_query = $temp;  //reset back to original query
	

?>
    <span style="text-align:right">&raquo; <a href="/dossiers/" title="Tous les dossiers">Voir tous les dossiers</a> <br /></span>
    <span style="text-align:right">&raquo; <a href="/emission/" title="Toutes les nots d'émissions">Voir toutes les notes d'émissions</a> <br /></span>
    
		</div>
	</div>



<!-- /ZONE 3 -->


<!-- ZONE 3bis  -->
<br />
<h3 style="margin-top:20px"><?php echo($titre_zone_3bis); ?></h3>
	<div class="postwrap fix">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style="padding:10px;">
			  <table width="100%"><tr>


<?php 
///////  HYPER CRADE!! A REFAIRE!
  $cat = $categorie_posts_zone_3bisa;
  $post_per_page = $nombre_posts_zone_3bisa; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'DESC',
    //'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); ?>

	<td style="width:33%; padding:5px;">
  <?php 
  if( have_posts() ) :  ?>
  <h5><?php echo($sous_titre_3bisa); ?></h5><ul>
  	<?php
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        		<li style="margin:0 0 10px 0;"><strong><?php the_date(); ?></strong> : <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
  <?php endwhile; ?>
</ul>
(<a href="http://www.podcastscience.fm/category/blogs-audio-science/">…</a>)<br />&raquo; <a href="http://www.podcastscience.fm/category/blogs-audio-science/">Tous les blogs de science en audio</a>
<?php endif; 
	
	$wp_query = $temp;  //reset back to original query

?>
      </td>
<?php 
///////  HYPER CRADE!! A REFAIRE!
  $cat = $categorie_posts_zone_3bisb;
  $post_per_page = $nombre_posts_zone_3bisb; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'DESC',
    //'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); ?>

	<td style="width:33%; padding:5px; border-left: solid gray 1px; border-right: solid gray 1px;">
  <?php 
  if( have_posts() ) :  ?>
  <h5><?php echo($sous_titre_3bisb); ?></h5><ul>
  	<?php
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        		<li style="margin:0 0 10px 0;"><strong><?php the_date(); ?></strong> : <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><br /> </li>
  <?php endwhile; ?>
</ul>
(<a href="http://www.podcastscience.fm/category/quizz-info-ou-intox/">…</a>)<br />&raquo; <a href="http://www.podcastscience.fm/category/quizz-info-ou-intox/">Tous les quizzes</a>
<?php endif; 
	
	$wp_query = $temp;  //reset back to original query

?>
      </td>

<?php 
///////  HYPER CRADE!! A REFAIRE!
  $cat = $categorie_posts_zone_3bisc;
  $post_per_page = $nombre_posts_zone_3bisc; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'DESC',
    //'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); ?>

	<td style="width:33%; padding:5px;">
  <?php 
  if( have_posts() ) :  ?>
  <h5><?php echo($sous_titre_3bisc); ?></h5><ul>
  	<?php
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        		<li style="margin:0 0 10px 0;"><strong><?php the_date(); ?></strong> : <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
  <?php endwhile; ?>
</ul>
(<a href="http://www.podcastscience.fm/category/son/">…</a>)<br />&raquo; <a href="http://www.podcastscience.fm/category/son/">Tous les sons</a>
<?php endif; 
	
	$wp_query = $temp;  //reset back to original query

?>
      </td>
		</tr></table>    
		</div>
	</div>



<!-- /ZONE 3bis -->


<!-- ZONE ILLUSTRATIONS -->
<br />
<h3><?php echo($titre_illustrations); ?></h3>
	<div class="postwrap fix">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style="padding:10px;">
			

			
<?php 
  $cat = $categorie_illustrations;
  $post_per_page = $nombre_illustrations; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'DESC',
    //'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); 
  if( have_posts() ) : 
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<h5 style="clear:both"><?php the_title(); ?></h5>
			<div class="entry">
          <?php the_content('',TRUE,'#'); ?>
      </div>

    <?php endwhile; ?>

  <?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Pb, ce loop va chercher les posts de la catégorie déclarée dans le champ custom categorie_illustrations (valeur: <?php echo $categorie_illustrations; ?>). Ya rien dedans?</p>
		<?php get_search_form(); ?>
	<?php endif; 
	
	$wp_query = $temp;  //reset back to original query
	

?>
		<span style="text-align:right">&raquo; <a href="/illustrations/" title="Toutes les illustrations">Voir toutes les illustrations</a> <br /></span>

		</div><!-- /post class -->

	</div><!-- /postwrap -->

<!-- /ZONE ILLUSTRATIONS -->






<!-- ZONE 4 -->


<br />
<h3 style="margin-top:20px"><?php echo($titre_zone_4); ?></h3>
	<div class="postwrap fix">
		<div <?php post_class() ?>" style="padding:10px;">
			<table border="0">
				<tr>
					<td rowspan="2" width="50%" style="padding:2px">
						<strong>Par catégorie</strong>
        	<?php
						$args=array(
						  'orderby' => 'id',
						  'order' => 'ASC',
						  );
						$categories=get_categories($args);
						  foreach($categories as $category) { 
						  	// exclusion catégorie mp3 (339) et teaser (586)
						  	if ($category->term_id !=339 && $category->term_id !=$categorie_posts_zone_2) {
							    echo '<p>&raquo&nbsp;<strong><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </strong> ';
							    echo '('. $category->count . ' entrées)<br />';  
							    echo '<span style="margin-left:10px">'. $category->description . '</span></p>';
						  	}
						   } 
						?>
					</td>
					<td style="padding:2px" width="50%">
						<strong>Par contributeur/trice</strong>
						<form action="<?php bloginfo('url'); ?>" method="get">
							<?php 
								$args=array('name' => 'author','orderby' => 'display_name','order' => 'ASC','exclude' => '1,15');
								wp_dropdown_users( $args ); ?>
							 <input style="margin-left:5px; font-size:10px; width:40px;" type="submit" name="submit" value="Voir" />
   					</form>
					</td>
				</tr>
				<tr>
					<td><br /> <br /> <br /><strong>La quote</strong><br />(à venir)</td>
				</tr>
			</table>
		</div>
	</div>

<!-- /ZONE 4 -->

	</div> <!-- end content -->
</div>

<?php get_sidebar(); ?>
<!-- End Standard Page -->