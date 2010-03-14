<?php
/*
 * Action for Image : List by tag
 * Vars : $imagePager
 */

echo £o('div.image.list.list_by_tag');

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