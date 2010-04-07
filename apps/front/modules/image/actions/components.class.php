<?php
/**
 * Image components
 * 
 * Components are micro-controllers that prepare data for a template.
 * You should not use redirection or database manipulation ( insert, update,
 * delete ) here.
 * To make redirections or manipulate database, use the actions class.
 */
class imageComponents extends dmFrontModuleComponents
{

  public function executeShow(dmWebRequest $request)
  {
    $this->maxSize = array(1400, 1200);
    
    $query = $this->getShowQuery('i')
    ->withDmMedia('Media')
    ->leftJoin('i.Auteur a')
    ->leftJoin('i.Tags t');
    
    $this->image = $this->getRecord($query);

    $this->commentaires = $this->image->getComments();
    
    $this->preloadPages($this->image->Tags);
    
    $imageIds = $this->getUser()->getImageIds();
    
    $imageIndex = array_search($this->image->id, $imageIds);
    
    $prevIndex = 0 == $imageIndex ? count($imageIds) - 1 : $imageIndex-1;
    $this->prevPage = $prevIndex == $imageIndex
    ? null
    : dmDb::query('DmPage p')
    ->where('p.module = ? AND p.action = ? AND p.record_id = ?', array('image', 'show', $imageIds[$prevIndex]))
    ->withI18n()
    ->fetchOne();
    
    $nextIndex = count($imageIds) == ($imageIndex+1) ? 0 : $imageIndex+1;
    $this->nextPage = $nextIndex == $imageIndex
    ? null
    : dmDb::query('DmPage p')
    ->where('p.module = ? AND p.action = ? AND p.record_id = ?', array('image', 'show', $imageIds[$nextIndex]))
    ->withI18n()
    ->fetchOne();
    
    if ($this->nextPage)
    {
      $nextRecord = dmDb::query('Image i')
      ->withDmMedia('Media')
      ->where('i.id = ?', $this->nextPage->recordId)
      ->fetchOne();
      
      $this->preloadImage = $this->context->getHelper()->media($nextRecord->Media)
      ->size($this->maxSize)
      ->method('scale')
      ->overlay($this->context->getHelper()->media(sfConfig::get('app_image_signature')), 'bottom-right')
      ->getSrc();
    }
    
    $this->back = $this->getUser()->getContext();
  }

  public function executeListTop()
  {
    $query = $this->getListQuery('i')->withDmMedia('Media')->orderBy('i.is_top DESC, RAND()');
    $this->imagePager = $this->getPager($query);
  }

  public function executeListByRubrique()
  {
    $query = $this->getListQuery()->withDmMedia('Media');
    $this->imagePager = $this->getPager($query);
    $this->rubrique = $this->getPage()->getRecord()->getAncestorRecord('Rubrique');
  }

  public function executeListByDmTag()
  {
    $query = $this->getListQuery()->withDmMedia('Media');
    $this->imagePager = $this->getPager($query);
  }

  public function executeListByContext()
  {
    $query = $this->getListQuery('i')->withDmMedia('Media');
    
    if ($currentTagId = $this->getUser()->getCurrentTagId())
    {
      $query->leftJoin('i.Tags t')->addWhere('t.id = ?', $currentTagId);
    }
    elseif(($image = $this->getPage()->getRecord()) instanceof Image)
    {
      $query->addWhere('i.rubrique_id = ?', $image->rubriqueId);
    }
    else
    {
    //      throw new dmException('Can not determine context for image pager query');
    }
    
    $this->imagePager = $this->getPager($query);
  }

  public function executeTop()
  {
    $query = $this->getShowQuery('i')
    ->withDmMedia('Media')
    ->andWhere('i.is_top = ?', true)
    ->orderBy('RAND()');
    
    $this->image = $this->getRecord($query);
  }

  public function executeList()
  {
    $query = $this->getListQuery('i')->withDmMedia('Media');
    
    $this->imagePager = $this->getPager($query);
    
    $this->getUser()->setImageIds(array());
  }

  public function executeListByAuteur()
  {
    $query = $this->getListQuery()->withDmMedia('Media');
    $this->imagePager = $this->getPager($query);
  }

}
