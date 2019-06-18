<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

if (isset($_POST["titre_tache"])) 
{
	$titre=$_POST["titre_tache"];
	$description=$_POST["description_tache"];

	$resultat = $wpdb->insert('wp_posts', array(
		'post_title'=> $titre,
		'post_type'=> 'task',
		'post_content'=> $description
	));


	// SELECT MAX(column_name)
	// FROM table_name
	// WHERE condition;

	// $dernier_post = $wpdb->get_var( "SELECT MAX(ID) FROM $wpdb->wp_posts" );

	$table_name = $wpdb->prefix . "posts";
	$last_post = $wpdb->get_results("SELECT MAX(ID) as max_id FROM $table_name");

	$last_post2= $last_post[0]->max_id;
	// $wpdb->get_results('wp_posts', array(
	//     'post_id'=> $titre,
	// 	'post_content'=> $desc
	// ));

	$wpdb->insert('wp_tp_tasks', array(
			'post_id'=> $last_post2
	));
}
?>


<form method="POST">
  Nouvelle tâche :<br>
  <input type="text" name="titre_tache"><br>
  Description :<br>
  <input type="text" name="description_tache">
  <input type="submit">
</form>



<?php 


// $wpdb->insert(
// 		$wpdb->prefix.'wp_posts',
// 		array(
// 			'post_title'=> 'YEYEYEYE',
// 			'post_content'=> 'JYUIBYGUIYGGYGIGUY FOUFOUF'

// 		)

// )

// $wpdb->insert('wp_posts', array(
//     'post_title'=> 'YEYEYEYE',
// 	'post_content'=> 'JYUIBYGUIYGGYGIGUY FOUFOUF'
// ));
?>




	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
