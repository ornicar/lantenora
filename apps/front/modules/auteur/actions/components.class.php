<?php
/**
 * Dm profile components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 * 
 */
class auteurComponents extends dmFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery('a')->where('a.is_visible = ?', true);
    $this->auteurPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    $this->auteur = $this->getRecord($query);
  }

  public function executeShowName()
  {
    $query = $this->getShowQuery();
    $this->auteur = $this->getRecord($query);
  }


}
