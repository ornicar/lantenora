<?php
/*
 * Action for Auteur : Show name
 * Vars : $auteur
 */

echo _open('div.auteur.show_name');

  echo _tag('h1.t_big', _tag('span.title_prefix', 'Auteur').$auteur->nom);
  
echo _close('div');
