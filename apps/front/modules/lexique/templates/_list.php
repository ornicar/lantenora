<?php
/*
 * Action for Lexique : List
 * Vars : $lexiquePager
 */

echo _open('div.lexique.list');

 echo $lexiquePager->renderNavigationTop();

  echo _open('ul.elements');

  foreach ($lexiquePager as $lexique)
  {
    echo _open('li.element');
    
      echo $lexique;
      
    echo _close('li');
  }

  echo _close('ul');

 echo $lexiquePager->renderNavigationBottom();

echo _close('div');