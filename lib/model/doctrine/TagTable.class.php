<?php

class TagTable extends myDoctrineTable
{
  
  public function findOneByNameOrCreate($name)
  {
    if (!$tag = $this->createQuery('t')->where('t.nom = ?', $name)->fetchRecord())
    {
      $tag = $this->create(array('nom' => $name))->saveGet();
    }
    
    return $tag;
  }
  
}
