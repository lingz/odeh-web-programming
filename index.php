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


<?php get_sidebar(); ?>

<main id="main" class="site-main" role="main">

    <header class="header">
      <h1>
          <?php bloginfo( 'name' ); ?>
      </h1>
      <h2>New York Universty</h2>
      <h2>
        <?php bloginfo( 'description' ); ?>
      </h2>
    </header>
    <div class="content">
      <?php
        // By default, get the slug 

        $index_query = new WP_QUERY("pagename=home");

        if ($index_query->have_posts()) {
          $index_query->the_post();
          ?>
          <div class="entry-content content">
            <?php the_content(); ?>
            <?php
              wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'odeh-web-programming' ),
                'after'  => '</div>',
              ) );
            ?>
          </div>
        <?php 
        } else {
          echo "Hello World there!";
        }
      ?>
    </div>
</main><!-- #main -->

<?php get_footer(); ?>
