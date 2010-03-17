<?php
/**
 * Tag components
 *
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 *
 */
class tagComponents extends dmFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery('t');
    $this->tagPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    $this->tag = $this->getRecord($query);
  }

  public function executeCloud()
  {
    $q = dmDb::query('Tag t')
    ->select('t.*')
    ->leftJoin('t.Images i')
    ->addSelect('COUNT(DISTINCT i.id) as nb_images')
    ->orderBy('nb_images DESC')
    ->groupBy('t.id')
    ->limit(dmConfig::get('tag_cloud_size', 30));
    
    $this->tags = $q->fetchRecords()->getData();
    
    usort($this->tags, create_function('$a, $b', 'return strcmp(strtolower($a->get("nom")), strtolower($b->get("nom")));'));
    
    $this->preloadPages($this->tags);
  }

}