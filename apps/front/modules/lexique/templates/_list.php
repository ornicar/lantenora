<?php
/*
 * Action for Lexique : List
 * Vars : $lexiquePager
 */

echo £o('div.lexique.list');

 echo $lexiquePager->renderNavigationTop();

  echo £o('ul.elements');

  foreach ($lexiquePager as $lexique)
  {
    echo £o('li.element');
    
      echo $lexique;
      
    echo £c('li');
  }

  echo £c('ul');

 echo $lexiquePager->renderNavigationBottom();

echo £c('div');