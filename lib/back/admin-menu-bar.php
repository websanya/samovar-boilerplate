<?php
/**
 * Add items to admin toolbar under Genesis menu.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */

//* Add default Genesis links and our new Samovar Settings link.
add_action('admin_bar_menu', 'samovar_add_toolbar_items', 100);
function samovar_add_toolbar_items($admin_bar) {
  $admin_bar->add_menu( array(
      'id'    => 'genesis',
      'title' => 'Genesis',
      'href'  => home_url() . '/wp-admin/admin.php?page=genesis',
      'meta'  => array(
          'title' => 'Genesis',            
      ),
  ));
  $admin_bar->add_menu( array(
      'id'    => 'genesis-main',
      'parent' => 'genesis',
      'title' => 'Theme Settings',
      'href'  => home_url() . '/wp-admin/admin.php?page=genesis',
      'meta'  => array(
          'title' => 'Theme Settings',
      ),
  ));
  $admin_bar->add_menu( array(
      'id'    => 'samovar-main',
      'parent' => 'genesis',
      'title' => 'Samovar Settings',
      'href'  => home_url() . '/wp-admin/admin.php?page=samovar_main',
      'meta'  => array(
          'title' => 'Theme Settings',
      ),
  ));
}