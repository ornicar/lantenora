<?php
/*
 * Action for Dm profile : Show
 * Vars : $auteur
 */

echo _open('div.auteur.show');

echo _tag('div.auteur_images',
  ($auteur->Media->exists() ? _media($auteur->Media)->width(321)->set('.auteur_image') : '').
  dm_get_widget('image', 'listByAuteur', array(
    'dm_user_id' => $auteur->id,
    'orderField' => 'created_at',
    'orderType' => 'asc',
    'maxPerPage' => 30,
  ))
);
  
  echo _tag('div.auteur_text', markdown($auteur->description));
  
echo _close('div');
