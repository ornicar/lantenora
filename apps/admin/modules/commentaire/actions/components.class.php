<?php

class commentaireComponents extends myAdminBaseComponents
{
  
  public function executeLast(dmWebRequest $request)
  {
    $this->commentaires = dmDb::query('DmComment c')
    ->orderBy('c.created_at desc')
    ->limit(6)
    ->fetchRecords();
  }
  
}