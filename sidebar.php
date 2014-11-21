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
        <a class="<?php echo (is_home() ? "active" : ""); ?> " href="<?php echo home_url(); ?>">Home</a>
      </li>
      <?php 
        // collect
        $nodes = array();
        $groups = array();
        $activeGroup = "";
        $pages_query = new WP_QUERY(array( "post_type" => "page", "orderby" => "menu_order", "order" => "ASC", "posts_per_page" => -1));
          while ($pages_query->have_posts()): 
            $pages_query->the_post();
            global $post;
            $slug = $post->post_name;
            $isHome = strcmp($slug, "home");
            if ($isHome == 0) {
              continue;
            }
            $customFields = get_post_custom();
            if (array_key_exists("group", $customFields)) {
              $group = $customFields["group"][0];
              if (is_page($post->ID)) {
                $activeGroup = $group;
              }
              if (array_key_exists($group, $groups)) {
                array_push($groups[$group], $post);
              } else {
                $newGroup = array($post);
                $groups[$group] = $newGroup;
                array_push($nodes, $group);
              }
            } else {
              array_push($nodes, $post);
            }
          endwhile;
          foreach ($nodes as $node) {
            if (is_string($node)) {
              $active = (strcmp($node, $activeGroup) == 0);
              $group = $groups[$node];
              ?>
                <li>
                  <a href="#" class="group-header <?php echo $active ? 'expanded' : ''; ?>" data-target="<?php echo $node; ?>">
                    <span class="down-arrow">&#9660;</span><span class="up-arrow">&#9650;</span> <?php echo $node;?>
                  </a>
                </li>
              <div id="<?php echo $node; ?>" class="group-node <?php echo $active ? 'visible' : ''; ?>">
              <?php
              foreach ($group as $post) {
                ?>
                  <li><a class="<?php echo (is_page($post->ID) ? "active" : ""); ?>" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></li>
                <?php
              }
              ?>
              </div>
              <?php
            } else {
              $post = $node;
              ?>
                <li><a class="<?php echo (is_page($post->ID) ? "active" : ""); ?>" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></li>
              <?php
            }
          }
        // render
      ?>
    </ul>
  </div>
</div>
