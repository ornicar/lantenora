<?php use_helper('Date', 'Text');
/*
 * Action for Commentaire : List by image
 * Vars : $commentairePager
 */

echo _open('div#commentaires.commentaire.list_by_image.list.screen_center');

 echo $commentairePager->renderNavigationTop();

  echo _open('ul.elements');

  foreach ($commentairePager as $commentaire)
  {
    echo _open('li.element');
    
      echo _tag("div.clearfix",
        £media("gravatar.jpg")->set(".fleft.imgleft").
        _tag("p.date", format_date($commentaire->createdAt)).
        _tag("p.auteur", auto_link_text($commentaire->auteur))
      ).
      _tag("div.texte", nl2br(auto_link_text($commentaire->texte)));
      
    echo _close('li');
  }

  echo _close('ul');

 echo $commentairePager->renderNavigationBottom();

echo _close('div');