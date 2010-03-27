<?php
/*
 * Action for Rubrique : Show
 * Vars : $rubrique
 */

echo _open('div.rubrique.show');

  echo _tag('span.diapo_link.none');

  echo _tag('h1.t_big', _tag('span.title_prefix', 'Galerie').$rubrique);
  
echo _close('div');