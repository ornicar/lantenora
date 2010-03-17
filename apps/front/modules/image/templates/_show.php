<?php use_helper('Date', 'Text', 'Bc');
/*
 * Action for Image : Show
 * Vars : $image
 */

echo £o('div#diapo_image.image.big', array('json' => array(
  'diapo_delay' => dmConfig::get('diapo_delay', 5) * 1000,
  'preload_url' => isset($preloadImage) ? $preloadImage : null
)));

echo £('div#image_help',
  £('p', £('strong', 'F11').'plein écran').
  £('p', £('strong', 'Echap').'quitter').
  £('p', £('strong', '←').'précédent').
  £('p', £('strong', '→').'suivant').
  £('p', £('strong', 'Espace').'diaporama')
);

$media = £media($image->Media)
->size($maxSize)
->method('scale')
->overlay(£media('overlay/logo.png'), 'bottom-right');

$realSize = $media->getRealSize();
$htmlSize = $sf_user->getBestSize($realSize);

if ($realSize != $htmlSize)
{
  $media->htmlSize($htmlSize);
}

echo £('div#full_image style="width: '.$htmlSize[0].'px; height: '.$htmlSize[1].'px;"',
  $media->set('.full_image.full_size')
);

echo £o('div.infos.screen_center');

echo £('h1.t_image', $image->nom);

echo £o('div.infos_box');

echo £("div.top",
  £("div", £link($image->auteurPage)).
  £("div.sep", "|").
  £("div", $image->date ? $image->date : format_date($image->createdAt)).
  £("div.sep", "|").
  £("div", £link("#commentaires")->text(plural("commentaire", count($image->Commentaires))))
);

echo £o("ul.image_tags.clearfix");

foreach($image->Tags as $tag)
{
  echo £("li.element", £link($tag));
}

echo £c("ul"), £c('div');

echo £o("div.description_technique.clearfix");

echo £('div#description', markdown($image->description));

if ($image->Commentaires->count())
{
  echo £o('div.commentaire.list_by_image.list');

    echo £o('ul.elements');
  
    foreach ($image->Commentaires as $commentaire)
    {
      echo £o('li.element');
      
        echo £("div.clearfix",
          £media("gravatar.jpg")->set(".fleft.imgleft").
          £("p.date", format_date($commentaire->createdAt)).
          £("p.auteur", auto_link_text(escape($commentaire->auteur)))
        ).
        £("div.texte", nl2br(auto_link_text(escape($commentaire->texte))));
        
      echo £c('li');
    }
  
    echo £c('ul');
  
  echo £c('div');
}

echo £c("div");

echo £c('div');

if($prevPage) echo £link($prevPage)->textTitle($prevPage->name)->set('#prev_image');

if($nextPage) echo £link($nextPage)->textTitle($nextPage->name)->set('#next_image');

if ($back && !$back->getNode()->isRoot())
{
  echo £link($back)->textTitle('Retour à '.$back->name)->set('#image_back');
}
else
{
  echo £link()->textTitle('Retour à l\'acceuil')->set('#image_back');
}

if($nextPage) echo £('a#image_play', 'Diaporama');

echo £c('div');