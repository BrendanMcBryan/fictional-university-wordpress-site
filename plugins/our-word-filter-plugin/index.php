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
    $mainPageHook = add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'data:image/svg+xml;base64, PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+', 100);
    // add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), plugin_dir_url(__FILE__) . 'custom.svg', 100);
    add_submenu_page('ourwordfilter', 'Words to Filter', 'Words List', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'));
    add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
    add_action("load-{$mainPageHook}", array($this, 'mainPageAssets'));
  }

  function mainPageAssets()
  {
    wp_enqueue_style('filterAdminCss', plugin_dir_url(__FILE__) . 'style.css');
  }

  function handleForm()
  {
    if (wp_verify_nonce($_POST['ourNonce'], 'saveFilterWords') and current_user_can('manage_options')) {
      update_option('plugin_words_to_filter', sanitize_text_field($_POST['plugin_words_to_filter'])); ?>

      <div class="updated">
        <p>Your Filtered Words Saved</p>
      </div>


    <?php  } else { ?>
      <div class="error">
        <p>Sorry you do not have permission to perform that action</p>
      </div>


    <?php      }
  }

  function wordFilterPage()
  { ?>
    <div class="wrap">
      <h1>Word Filter</h1>

      <?php


      if (isset($_POST['justsubmitted']) == "true") $this->handleForm() ?>
      <form method="post">
        <input type="hidden" name="justsubmitted" value="true">
        <?php wp_nonce_field('saveFilterWords', 'ourNonce') ?>
        <label for="plugin_words_to_filter">
          <p> enter a <strong>comma-seperated</strong> liste of words you want to filter
          <p>
        </label>
        <div class="word-filter__flex-container">
          <textarea name="plugin_words_to_filter" id="plugin_words_to_filter" placeholder="Bad Words"><?php echo esc_textarea(get_option('plugin_words_to_filter'))  ?></textarea>
        </div>
        <input type="submit" name='submit' id="submit" class="button button-primary" value="Save Changes" />
      </form>
    </div>
  <?php  }

  function optionsSubPage()
  { ?>

    submenu pages html goes header_register_callback

<?php }
}

$ourWordFilterPlugin = new OurWordFilterPlugin();
