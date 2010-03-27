<?php
/*
 * Action for Rubrique : List
 * Vars : $rubriquePager
 */

echo _open('div.rubrique.list');

 echo $rubriquePager->renderNavigationTop();

  echo _open('ul.elements');

  foreach ($rubriquePager as $rubrique)
  {
    echo _open('li.element');
    
      echo _link($rubrique);
      
    echo _close('li');
  }

  echo _close('ul');

 echo $rubriquePager->renderNavigationBottom();

echo _close('div');