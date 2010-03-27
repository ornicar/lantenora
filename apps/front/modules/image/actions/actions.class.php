<?php

/*
 * Image : actions
 */
class imageActions extends dmFrontModuleActions
{
  
  public function executeListWidget()
  {
    $this->getUser()->setContext($this->getPage());
    
    $this->getUser()->getImageIds(true);
  }
  
  public function executeListByTagWidget()
  {
    $this->saveContext();
  }
  
  public function executeListByRubriqueWidget()
  {
    $this->saveContext();
  }
  
  public function executeListByUserWidget()
  {
    $this->saveContext();
  }

  protected function saveContext()
  {
    $this->getUser()->setContext($this->getPage());
    
    $images = dmDb::query('Image i')
    ->whereAncestor($this->context->getPage()->getRecord(), 'Image')
    ->andWhere('i.is_active = ?', true)
    ->orderBy('i.position ASC')
    ->select('i.id')
    ->fetchPDO();
    
    $ids = array();
    foreach($images as $image)
    {
      $ids[] = $image[0];
    }
    
    $this->getUser()->setImageIds($ids);
  }
  
  public function executeRss(dmWebRequest $request)
  {
    $query = dmDb::query('Image i, i.Rubrique r')
    ->withDmMedia('Media')
    ->where('i.is_active = ?', true)
    ->orderBy('i.created_at DESC')
    ->limit(12);

    $images = $query->fetchRecords();

    $this->preloadPages($images);

    $feed = new sfRssFeed();

    $feed->setTitle('Blanc Cerf - Nouvelles photos');
    $feed->setLink('http://esmeree.fr/blanc-cerf');
    $feed->setAuthorName('Pascal Duplessis');

    foreach ($images as $image)
    {
      $item = new sfFeedItem();
      $item->setTitle($image->nom);
      $item->setLink($this->getHelper()->link($image)->getHref());
      $item->setAuthorName($image->Auteur->username);
      $item->setPubdate($image->getDateTimeObject('created_at')->format('U'));
      $item->setUniqueId($image->nom.' ('.$image->id.')');
      
      $description = $this->getHelper()->link($image)->text($this->getHelper()->£media($image->Media)->width(600)).
      $this->context->get('markdown')->toHtml($image->description);
      
      $tagLinks = array();
      foreach($image->Tags as $tag)
      {
        $tagLinks[] = $this->getHelper()->link($tag);
      }
      
      if (count($tagLinks))
      {
        $description .= '<br />'.implode(', ', $tagLinks);
      }
      
      $item->setDescription($description);

      $feed->addItem($item);
    }

    $this->feed = $feed;
  }
}