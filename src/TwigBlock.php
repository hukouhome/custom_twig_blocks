<?php

namespace Drupal\custom_twig_blocks;

use Drupal;
use Drupal\block\Entity\Block as DrupalBlock;

/**
 * Define a class to work with site specific blocks.
 */
class TwigBlock {

  protected $path;

  protected $content_type;

  protected $vars;

  /**
   * Construct a Block.
   *
   * @param array $vars
   *   The Drupal variables used by Twig.
   */
  public function __construct(&$vars) {
    $this->path = Drupal::service('path.current')->getPath();
    $this->vars = &$vars;
    if(isset($vars['node'])) {
      $this->content_type = $vars['node']->getType();
    }
    
  }

  /**
   * Add an existing block to the Twig variables. The block needs to be disabled
   * or visible on the block page to work.
   *
   * @param string $block_name
   *   The machine name of the block.
   * @param string $var_name
   *   The twig variable to add to the page.
   */
  public function add($block_name, $var_name) {
    $block = DrupalBlock::load($block_name);
    $this->vars[$var_name] = Drupal::entityTypeManager()
      ->getViewBuilder('block')
      ->view($block);
  }

  /**
   * Render a view display and put it in a variable.
   *
   * @param string $view_name
   *   The machine name of the view.
   * @param string $display_name
   *   The machine name of the view display to show.
   * @param string $var_name
   *   The twig variable to add to the page.
   */
  public function addFromView($view_name, $display_name, $var_name, $view_args = '') {
    $this->vars[$var_name] = views_embed_view($view_name, $display_name, $view_args);
  }

}