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
    $this->auteurPage = $this->getAuteur();
  }

  public function executeHeadLinks()
  {
    $this->auteurPage = $this->getAuteur();
  }

  protected function getAuteur()
  {
    return dmDb::query('DmPage p')
    ->where('p.module = ?', 'auteur')
    ->andWhere('p.action = ?', 'show')
    ->andWhere('p.record_id = ?', 2)
    ->withI18n()
    ->fetchOne();
  }

  public function executeSitemap()
  {
    $this->sitemap = $this->getService('sitemap_menu')->build();
  }


}
