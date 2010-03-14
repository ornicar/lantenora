<?php

require_once(dm::getDir().'/dmFrontPlugin/lib/config/dmFrontApplicationConfiguration.php');

class frontConfiguration extends dmFrontApplicationConfiguration
{
  
  public function setup()
  {
    parent::setup();
    
    $this->enablePlugins('sfFeed2Plugin');
  }
  
  public function configure()
  {
  }
  
}
