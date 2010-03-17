<?php
/**
 * Invité components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 */
class inviteComponents extends dmFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    $this->invitePager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    $this->invite = $this->getRecord($query);
  }


}
