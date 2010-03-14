<?php
/**
 * Commentaire components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 * 
 */
class commentaireComponents extends dmFrontModuleComponents
{

  public function executeListByImage()
  {
    $query = $this->getListQuery();
    $this->commentairePager = $this->getPager($query);
  }

  public function executeForm()
  {
    $this->form = $this->forms['commentaire'];
  }


}
