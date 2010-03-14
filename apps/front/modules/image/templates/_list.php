<?php
/*
 * Action for Image : List
 * Vars : $imagePager
 */

echo £o('div.image.list.clearfix');

  echo £link(dmArray::first($imagePager->getResults()))->param('diapo', 1)->set('.diapo_link')->text('Afficher en diaporama');

  echo £('h1.t_big', 'Images récentes');

  echo $imagePager->renderNavigationTop();

  echo £o('ul.elements.fleft.clearfix');

  foreach ($imagePager as $image)
  {
    echo £o('li.element.medium_image');
    
      include_partial('image/_medium', array('image' => $image));
      
    echo £c('li');
  }

  echo £c('ul');

 echo $imagePager->renderNavigationBottom();

echo £c('div');