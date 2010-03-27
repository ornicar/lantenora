<?php
/*
 * Action for Tag : List
 * Vars : $tagPager
 */

echo _open('div.tag.list.mt20.ml20');

 echo $dmTagPager->renderNavigationTop();

  echo _open('ul.elements');
  
  foreach ($dmTagPager as $tag)
  {
    echo _tag('li.element', _link($tag)->text($tag->get('name')));
  }

  echo _close('ul');

 echo $dmTagPager->renderNavigationBottom();

echo _close('div');