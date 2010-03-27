<?php
/*
 * Action for Dm profile : List
 * Vars : $auteurPager
 */

echo _open('div.auteur.list');

 echo $auteurPager->renderNavigationTop();

  echo _open('ul.elements.clearfix');

  foreach ($auteurPager as $auteur)
  {
    echo _open('li.element');
    
      echo _link($auteur)->text($auteur->nom);
      
    echo _close('li');
  }

  echo _close('ul');

 echo $auteurPager->renderNavigationBottom();

echo _close('div');