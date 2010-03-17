<?php

require_once(dm::getDir().'/dmAdminPlugin/lib/config/dmAdminApplicationConfiguration.php');

class adminConfiguration extends dmAdminApplicationConfiguration
{
  public function configure()
  {
    $this->dispatcher->connect('dm.admin_homepage.filter_windows', array($this, 'listenToFilterWindowsEvent'));
  }

  public function listenToFilterWindowsEvent(sfEvent $event, array $windows)
  {
    $windows[1] = array(
      'visitChart' => $windows[1]['visitChart'],
      'commentaires' => array($this, 'renderCommentaires'),
      'logChart' => $windows[1]['logChart'],
    );

    return $windows;
  }

  public function renderCommentaires(dmHelper $helper)
  {
    return $helper->renderComponent('commentaire', 'last');
  }
}