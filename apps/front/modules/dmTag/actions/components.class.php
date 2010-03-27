<?php

require_once sfConfig::get('sf_plugins_dir').'/dmTagPlugin/modules/dmTag/lib/BasedmTagComponents.class.php';

class dmTagComponents extends BasedmTagComponents
{

  public function executeCloud()
  {
    new Image();
    
    $q = dmDb::query('DmTag t')
    ->select('t.*')
    ->leftJoin('t.Images i')
    ->addSelect('COUNT(DISTINCT i.id) as nb_images')
    ->orderBy('nb_images DESC')
    ->groupBy('t.id')
    ->limit(dmConfig::get('tag_cloud_size', 30));
    
    $this->tags = $q->fetchRecords()->getData();
    
    usort($this->tags, create_function('$a, $b', 'return strcmp(strtolower($a->get("name")), strtolower($b->get("name")));'));
    
    $this->preloadPages($this->tags);
  }

}