<?php

namespace Drupal\custom_twig_blocks;

class MySiteNodeType extends TwigBlock {

  public function preprocessNode() {

    switch($this->content_type) {
      case 'cool_node_type':
        $this->addFromView('view_name', 'view_display_name', 'twig_var_name', $this->vars['node']->id());
        break;
    }

  }

}