<?php

class myLayoutHelper extends dmFrontLayoutHelper
{
  public function renderHead()
  {
    return parent::renderHead().
    $this->renderRssLink();
  }
  
  public function renderRssLink()
  {
    return sprintf('<link rel="alternate" type="application/rss+xml" title="Rss" href="%s" />',
      $this->serviceContainer->getService('helper')->link('@rss')->getHref()
    );
  }
}