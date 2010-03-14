<?php
/**
 * Main components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 * 
 * 
 */
class mainComponents extends dmFrontModuleComponents
{

  public function executeTest()
  {
    // Your code here
  }

  public function executeFooter()
  {
    // Your code here
  }

  public function executeHeadLinks()
  {
    $this->auteurPage = dmDb::query('DmPage p')
    ->where('p.module = ?', 'auteur')
    ->andWhere('p.action = ?', 'show')
    ->andWhere('p.record_id = ?', 2)
    ->withI18n()
    ->fetchOne();
    // Your code here
  }


}
