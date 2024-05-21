<?php

/*
  Plugin Name: Our Word Filter Plugin
  Description: Filters some words and replaces them with others
  Version: 1.0
  Author: Brendan
  Author URI: https://www.designingintent.com/

*/

use function Members\Core_Create_Caps\admin_menu;

if (!defined('ABSPATH')) exit; //exit if accessed directly

class OurWordFilterPlugin
{

  function __construct()
  {
    add_action('admin_menu', array($this, 'ourMenu'));
  }


  function ourMenu()
  {
    add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'dashicons-smiley', 100);
    add_submenu_page('ourwordfilter', 'Words to Filter', 'Words List', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'));
    add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
  }

  function wordFilterPage()
  { ?>
    hello wordFilterPage
  <?php  }

  function optionsSubPage()
  { ?>

    submenu pages html goes header_register_callback

<?php }
}

$ourWordFilterPlugin = new OurWordFilterPlugin();
