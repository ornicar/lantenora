<?php
/*
 * Action for Image : List by rubrique
 * Vars : $imagePager
 */

echo _open('div.image.list.list_by_rubrique.clearfix');

  if($rubrique->Preface && $rubrique->Preface->exists())
  {
    include_partial('rubrique/preface', array('preface' => $rubrique->Preface));
  }

  echo _open('ul.elements.clearfix');

  foreach ($imagePager as $image)
  {
    echo _open('li.element.medium_image');
    
      include_partial('image/_medium', array('image' => $image));
      
    echo _close('li');
  }

  echo _close('ul');

echo _close('div');