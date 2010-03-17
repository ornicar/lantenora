<?php

class myUser extends dmFrontUser
{
  public function getScreenWidth()
  {
    return $this->getAttribute('screen.width');
  }
  public function getScreenHeight()
  {
    return $this->getAttribute('screen.height');
  }

  public function getScreenSize()
  {
    if ($this->getScreenWidth() && $this->getScreenHeight())
    {
      return array($this->getScreenWidth(), $this->getScreenHeight());
    }

    return null;
  }

  public function getBestSize(array $imgSize)
  {
    $size = $imgSize;

    if ($mySize = $this->getScreenSize())
    {
      $ratio1 = $imgSize[0]/$mySize[0];
      $ratio2 = $imgSize[1]/$mySize[1];
      
      if($ratio1>$ratio2)
      {
        $size[0]= round($mySize[0]);
        $size[1]= round($imgSize[1]/$ratio1);
      }
      else
      {
        $size[1]= round($mySize[1]);
        $size[0]= round($imgSize[0]/$ratio2);
      }
    }

    return $size;
  }

  public function setScreenWidth($val)
  {
    $this->setAttribute('screen.width', $val);
    return $this;
  }
  public function setScreenHeight($val)
  {
    $this->setAttribute('screen.height', $val);
    return $this;
  }
  
  public function setImageIds(array $ids)
  {
    return $this->setAttribute('image_ids', implode(',', $ids));
  }
  
  public function getImageIds($all = false)
  {
    $imageIdsAttribute = $this->getAttribute('image_ids');
    
    if ($all || empty($imageIdsAttribute))
    {
      $imageIds = dmDb::query('Image i')
      ->where('i.is_active = ?', true)
      ->orderBy('i.position ASC')
      ->select('i.id')
      ->fetchPDO();
      
      foreach($imageIds as $index => $imageArray)
      {
        $imageIds[$index] = $imageArray[0];
      }
      
      $this->setImageIds($imageIds);
    }
    else
    {
      $imageIds = explode(',', $imageIdsAttribute);
    }
    
    return $imageIds;
  }
  
  public function setContext(DmPage $page)
  {
    return $this->setAttribute('context', $page->id);
  }

  public function getContext()
  {
    if (!$pageId = $this->getAttribute('context'))
    {
      return dmDb::table('DmPage')->fetchRootWithI18n();
    }
    
    return dmDb::table('DmPage')->findOneByIdWithI18n($pageId);
  }

}