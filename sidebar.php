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
    <ul>
      <li>
        <a class="<?php echo (is_home() ? "active" : ""); ?> " href="/">Home</a>
      </li>
      <?php 
        $pages_query = new WP_QUERY(array( "post_type" => "page", "orderby" => "menu_order", "order" => "ASC"));
          while ($pages_query->have_posts()): 
            $pages_query->the_post();
            $slug = basename(get_the_slug());
            $isHome = strcmp($slug, "home");
            if ($isHome != 0) {
              ?>
                <li><a class="<?php echo (is_page($slug) ? "active" : ""); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
              <?php
            }
          endwhile;
      ?>
    </ul>
  </div>
</div>
