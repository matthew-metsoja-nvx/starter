<?php
/**
 *
 * navJumbo
 *
 * @package sandbox
 *
 */

function get_menu_id($location)
{
    // get all the locations
    $locations = get_nav_menu_locations();

    // get object id by location.
    $menu_id = $locations[$location];

    return !empty($menu_id) ? $menu_id : '';

}

function get_child_menu_items($menu_array, $parent_id)
{
    $child_menus = [];

    // always check that the array is NOT empty before running the foreach loop.
    if (!empty($menu_array) && is_array($menu_array)) {
        foreach ($menu_array as $menu) {
            // check to see if parent id is the same as the parent.
            if (intval($menu->menu_item_parent) === $parent_id) {
                array_push($child_menus, $menu);
            }
        }
    }

    return $child_menus;
}

$header_menu_id = get_menu_id('sandbox-header-menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<div class="container-fluid py-1 bg-light">
    <div class="row pt-3 pb-1">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid flex-row flex-md-column">
                <!-- Call the custom logo function -->
                <?php if (function_exists('the_custom_logo')) {the_custom_logo();}?>

                <!-- toggler button-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse align-items-center" id="navbarTogglerDemo02">
                    <?php if (!empty($header_menus) && is_array($header_menus)) {?>

                    <ul class="navbar-nav ">

                        <?php
foreach ($header_menus as $menu_item) {
    if (!$menu_item->menu_item_parent) {

        $child_menu_items = get_child_menu_items($header_menus, $menu_item->ID);

        $has_children = !empty($child_menu_items) && is_array($child_menu_items);

        if (!$has_children) {?>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo esc_url($menu_item->url); ?>"><?php echo esc_html($menu_item->title); ?></a>
                        </li>

                        <?php } else {?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo esc_html($menu_item->title); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach ($child_menu_items as $child_menu_item) {?>
                                <li>
                                    <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>">
                                        <?php echo esc_html($child_menu_item->title); ?>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php }
    }
}?>
                    </ul>

                    <?php

}?>

                </div>
            </div>
        </nav>
    </div>
</div>