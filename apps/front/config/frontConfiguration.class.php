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
    $this->dispatcher->connect('dm.context.loaded', array($this, 'listenToContextLoadedEvent'));
  }

  public function listenToContextLoadedEvent(sfEvent $event)
  {
    if($theme = $event->getSubject()->getRequest()->getParameter('theme'))
    {
      $event->getSubject()->getUser()->setAttribute('theme', $theme);
    }
  }
}
