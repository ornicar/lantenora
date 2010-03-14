<?php use_helper('Date', 'Text');
/*
 * Action for Commentaire : List by image
 * Vars : $commentairePager
 */

echo £o('div#commentaires.commentaire.list_by_image.list.screen_center');

 echo $commentairePager->renderNavigationTop();

  echo £o('ul.elements');

  foreach ($commentairePager as $commentaire)
  {
    echo £o('li.element');
    
      echo £("div.clearfix",
        £media("gravatar.jpg")->set(".fleft.imgleft").
        £("p.date", format_date($commentaire->createdAt)).
        £("p.auteur", auto_link_text($commentaire->auteur))
      ).
      £("div.texte", nl2br(auto_link_text($commentaire->texte)));
      
    echo £c('li');
  }

  echo £c('ul');

 echo $commentairePager->renderNavigationBottom();

echo £c('div');