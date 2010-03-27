<?php
/*
 * Action for Dm profile : Show
 * Vars : $auteur
 */

echo _open('div.auteur.show');

  echo $auteur->Media->exists() ? £media($auteur->Media)->width(300)->set('.auteur_image') : '';
  
  echo _tag('div.auteur_text', markdown($auteur->description));
  
echo _close('div');
