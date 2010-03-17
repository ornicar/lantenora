<?php

require_once(dm::getDir().'/dmFrontPlugin/lib/config/dmFrontApplicationConfiguration.php');

class frontConfiguration extends dmFrontApplicationConfiguration
{
  protected
  $container;
  
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
    $this->container = $event->getSubject()->getServiceContainer();
    
    $this->dispatcher->connect('dm.context.change_page', array($this, 'listenToChangePageEvent'));
  }

  public function listenToChangePageEvent(sfEvent $event)
  {
    if($event['page']->isModuleAction('rubrique', 'show'))
    {
      $backgroundNumber = $event['page']->getRecord()->backgroundNumber;
    }

    if(!isset($backgroundNumber))
    {
      $backgroundNumber = 1;
    }

    $this->container->mergeParameter('layout_helper.options', array(
      'background_number' => $backgroundNumber
    ));
  }
}
