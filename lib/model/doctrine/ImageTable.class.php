<?php

class ImageTable extends myDoctrineTable
{
  
  public function getAdminListQuery(dmDoctrineQuery $q)
  {
    $rootAlias = $q->getRootAlias();
    return $q->withDmMedia('Media')
    ->leftJoin($rootAlias.'.Rubrique rubrique')
    ->leftJoin($rootAlias.'.Tags tags')
    ;
  }
  
}