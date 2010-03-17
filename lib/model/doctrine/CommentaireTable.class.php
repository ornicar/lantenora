<?php

class CommentaireTable extends myDoctrineTable
{
  public function getIdentifierColumnName()
  {
    return 'auteur';
  }
}