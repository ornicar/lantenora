<?php
/**
 * Categ de liens components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 */
class lienTypeComponents extends dmFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery('t')
    ->leftJoin('t.Liens l ON l.is_active = ? AND l.lien_type_id = t.id', true);
    $this->lienTypePager = $this->getPager($query);
  }


}
