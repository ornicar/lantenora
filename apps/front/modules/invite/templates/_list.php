<?php
/*
 * Action for Invité : List
 * Vars : $invitePager
 */

echo £o('div.invite.list');

 echo $invitePager->renderNavigationTop();

  echo £o('ul.elements');

  foreach ($invitePager as $invite)
  {
    echo £o('li.element');
    
      echo £link($invite);
      
    echo £c('li');
  }

  echo £c('ul');

 echo $invitePager->renderNavigationBottom();

echo £c('div');