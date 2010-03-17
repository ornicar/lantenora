<?php

/**
 * Image
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    lantenora
 * @subpackage model
 * @author     thibault d <you@email.com>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
class Image extends BaseImage
{

  public function getAuteurPage()
  {
    return dmDb::query('DmPage p')
    ->where('p.module = ?', 'auteur')
    ->andWhere('p.action = ?', 'show')
    ->andWhere('p.record_id = ?', $this->user_id)
    ->withI18n()
    ->fetchOne();
  }
  
  public function getTagsText()
  {
    return implode(', ', $this->Tags->getData());
  }
  
  public function setTagsText($tagsText)
  {
    $tags = dmDb::query('Tag t INDEXBY t.nom')
    ->leftJoin('t.ImageTag it')
    ->where('it.image_id = ?', $this->id)
    ->fetchRecords();
    
    $newTagsNames = array_filter(array_map('trim', explode(',', $tagsText)));
  
    $changed = false;
    
    foreach($tags as $key => $tag)
    {
      if (!in_array($tag->get('nom'), $newTagsNames))
      {
        $changed = true;
        unset($tags[$key]);
      }
    }
    foreach($newTagsNames as $tagName)
    {
      if (!$tags->contains($tagName))
      {
        $changed = true;
        $tags[$tagName] = dmDb::table('Tag')->findOneByNameOrCreate($tagName);
      }
    }
    
    if ($changed)
    {
      $this->Tags = $tags;
    }
  }

  
}