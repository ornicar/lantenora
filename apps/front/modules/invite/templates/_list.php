<?php
/*
 * Action for Invité : List
 * Vars : $invitePager
 */

echo _open('div.invite.list');

 echo $invitePager->renderNavigationTop();

  echo _open('ul.elements');

  foreach ($invitePager as $invite)
  {
    echo _open('li.element');
    
      echo _link($invite);
      
    echo _close('li');
  }

  echo _close('ul');

 echo $invitePager->renderNavigationBottom();

echo _close('div');