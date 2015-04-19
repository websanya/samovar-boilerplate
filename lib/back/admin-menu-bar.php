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
    'id'    => 'samovar-boilerplate',
    'title' => 'Samovar Boilerplate',
//     'href'  => admin_url( 'admin.php?page=genesis' ),
    'meta'  => array(
      'title' => 'Genesis',
    ),
  ));
  $admin_bar->add_menu( array(
    'id'     => 'genesis-main',
    'parent' => 'samovar-boilerplate',
    'title'  => 'Genesis Settings',
    'href'   => admin_url( 'admin.php?page=genesis' ),
    'meta'   => array(
      'title' => 'Genesis Settings',
    ),
  ));
  $admin_bar->add_menu( array(
    'id'     => 'samovar-main',
    'parent' => 'samovar-boilerplate',
    'title'  => 'Samovar Settings',
    'href'   => admin_url( 'admin.php?page=samovar_main' ),
    'meta'   => array(
      'title' => 'Samovar Settings',
    ),
  ));
  foreach ( TGM_Plugin_Activation::$instance->plugins as $plugin ) {
	  if ( ! is_plugin_active( $plugin['file_path'] ) ) {
		  $admin_bar->add_menu( array(
		    'id'     => 'tgmpa-install-plugins',
		    'parent' => 'samovar-boilerplate',
		    'title'  => 'Install Required Plugins',
		    'href'   => admin_url( 'themes.php?page=tgmpa-install-plugins' ),
		    'meta'   => array(
		      'title' => 'Install Required Plugins',
		    ),
		  ));
		  break;
	  }
  }
}