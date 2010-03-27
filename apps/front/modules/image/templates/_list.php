<?php
/*
 * Action for Image : List
 * Vars : $imagePager
 */

echo _open('div.image.list.clearfix');

  echo _link(dmArray::first($imagePager->getResults()))->param('diapo', 1)->set('.diapo_link')->text('Afficher en diaporama');

  echo _tag('h1.t_big', 'Images récentes');

  echo $imagePager->renderNavigationTop();

  echo _open('ul.elements.fleft.clearfix');

  foreach ($imagePager as $image)
  {
    echo _open('li.element.medium_image');
    
      include_partial('image/_medium', array('image' => $image));
      
    echo _close('li');
  }

  echo _close('ul');

 echo $imagePager->renderNavigationBottom();

echo _close('div');