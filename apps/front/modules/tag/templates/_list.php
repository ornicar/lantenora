<?php
/*
 * Action for Tag : List
 * Vars : $tagPager
 */

echo £o('div.tag.list.mt20.ml20');

 echo $tagPager->renderNavigationTop();

  echo £o('ul.elements');
  
  foreach ($tagPager as $tag)
  {
    echo £('li.element', £link($tag)->text($tag->get('nom')));
  }

  echo £c('ul');

 echo $tagPager->renderNavigationBottom();

echo £c('div');