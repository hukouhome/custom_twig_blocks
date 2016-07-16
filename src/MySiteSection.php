<?php

namespace Drupal\custom_twig_blocks;

class MySiteSection extends TwigBlock {

  public function preprocessPage() {

    switch($this->path) {
      case '/any/drupal/path':
        $this->addFromView('view_name', 'view_display_name', 'twig_var_name');
        break;
    }

  }

}