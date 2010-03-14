<?php
/*
 * Action for Auteur : Show name
 * Vars : $auteur
 */

echo £o('div.auteur.show_name');

  echo £('h1.t_big', £('span.title_prefix', 'Auteur').$auteur->nom);
  
echo £c('div');
