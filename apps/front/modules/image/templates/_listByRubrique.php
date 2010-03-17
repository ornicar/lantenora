<?php
/*
 * Action for Image : List by rubrique
 * Vars : $imagePager
 */

echo £o('div.image.list.list_by_rubrique.clearfix');

 echo $imagePager->renderNavigationTop();

  echo £o('ul.elements.clearfix');

  foreach ($imagePager as $image)
  {
    echo £o('li.element.medium_image');
    
      include_partial('image/_medium', array('image' => $image));
      
    echo £c('li');
  }

  echo £c('ul');

 echo $imagePager->renderNavigationBottom();

echo £c('div');