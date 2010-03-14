<?php

class commentaireComponents extends myAdminBaseComponents
{
  
  public function executeLast(dmWebRequest $request)
  {
    $this->commentaires = dmDb::query('Commentaire c, c.Image i')
    ->select('c.id, c.created_at, c.auteur, i.nom')
    ->orderBy('c.created_at desc')
    ->limit(6)
    ->fetchRecords();
  }
  
}