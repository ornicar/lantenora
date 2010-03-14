<?php
/*
 * Action for Dm profile : Show
 * Vars : $auteur
 */

echo £o('div.auteur.show');

  echo $auteur->Media->exists() ? £media($auteur->Media)->width(300)->set('.auteur_image') : '';
  
  echo £('div.auteur_text', markdown($auteur->description));
  
echo £c('div');
