<?php
/**
 * Lexique components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 */
class lexiqueComponents extends dmFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    $this->lexiquePager = $this->getPager($query);
  }


}
