<?php
/*
 * Action for Rubrique : List
 * Vars : $rubriquePager
 */

echo £o('div.rubrique.list');

 echo $rubriquePager->renderNavigationTop();

  echo £o('ul.elements');

  foreach ($rubriquePager as $rubrique)
  {
    echo £o('li.element');
    
      echo £link($rubrique);
      
    echo £c('li');
  }

  echo £c('ul');

 echo $rubriquePager->renderNavigationBottom();

echo £c('div');