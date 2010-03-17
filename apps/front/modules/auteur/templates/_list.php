<?php
/*
 * Action for Dm profile : List
 * Vars : $auteurPager
 */

echo £o('div.auteur.list');

 echo $auteurPager->renderNavigationTop();

  echo £o('ul.elements.clearfix');

  foreach ($auteurPager as $auteur)
  {
    echo £o('li.element');
    
      echo £link($auteur)->text($auteur->nom);
      
    echo £c('li');
  }

  echo £c('ul');

 echo $auteurPager->renderNavigationBottom();

echo £c('div');