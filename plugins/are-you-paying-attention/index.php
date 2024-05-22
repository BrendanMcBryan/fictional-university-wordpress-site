<?php

/*
  Plugin Name: Are you paying attention
  Description: ger Reader Multiple Choice Questions.
  Version: 1.0
  Author: Brendan
  Author URI: https://www.designingintent.com/

*/


if (!defined('ABSPATH')) exit; // Exit if accessed directly
class AreYouPayingAttention
{
  function __construct()
  {
    add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
  }

  function adminAssets()
  {
    wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
  }
}

$areYouPayingAttention = new AreYouPayingAttention();
