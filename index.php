<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package odeh-web-programming
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
        // By default, get the slug 

        $index_query = new WP_QUERY("pagename=index");

        if ($index_query->have_posts()) {
          $index_query->the_post();
          get_template_part( 'content', 'page' );
          echo "Index exists";
        } else {
          echo "Hello World!";
        }
      ?>
      


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
