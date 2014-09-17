<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package odeh-web-programming
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
</a>

<div id="menu">
  <div class="pure-menu pure-menu-open">
    <a class="pure-menu-heading" href="/">Home</a>
    <ul>
      <?php 
        $pages_query = new WP_QUERY(array( "post_type" => "page", "orderby" => "menu_order", "order" => "ASC"));
          while ($pages_query->have_posts()): 
            $pages_query->the_post();
            $slug = basename(get_permalink());
            $isIndex = strcmp($slug, "index");
            if ($isIndex != 0) {
              ?>
                <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
              <?php
            }
          endwhile;
      ?>
    </ul>
  </div>
</div>
