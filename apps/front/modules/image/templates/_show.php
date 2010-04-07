<?php use_helper('Date', 'Text');
/*
 * Action for Image : Show
 * Vars : $image
 */

echo _open('div#diapo_image.image.big', array('json' => array(
  'diapo_delay' => dmConfig::get('diapo_delay', 5) * 1000,
  'preload_url' => isset($preloadImage) ? $preloadImage : null
)));

echo _tag('div#image_help',
  _tag('p', _tag('strong', 'F11').'plein écran').
  _tag('p', _tag('strong', 'Echap').'quitter').
  _tag('p', _tag('strong', '←').'précédent').
  _tag('p', _tag('strong', '→').'suivant').
  _tag('p', _tag('strong', 'Espace').'diaporama')
);

$media = _media($image->Media)
->size($maxSize)
->method('scale')
->overlay(_media(sfConfig::get('app_image_signature')), 'bottom-right');

$realSize = $media->getRealSize();
$htmlSize = $sf_user->getBestSize($realSize);

if ($realSize != $htmlSize)
{
  $media->htmlSize($htmlSize);
}

echo _tag('div#full_image style="width: '.$htmlSize[0].'px; height: '.$htmlSize[1].'px;"',
  $media->set('.full_image.full_size')
);

echo _open('div.infos.screen_center');

echo _tag('h1.t_image', $image->nom);

echo _open('div.infos_box');

echo _tag("div.top",
  _tag("div", _link($image->auteurPage)).
  _tag("div.sep", "|").
  _tag("div", $image->date ? $image->date : format_date($image->createdAt)).
  _tag("div.sep", "|").
  _tag("div", _link("#commentaires")->text(plural("commentaire", count($commentaires))))
);

echo _open("ul.image_tags.clearfix");

foreach($image->Tags as $tag)
{
  echo _tag("li.element", _link($tag));
}

echo _close("ul"), _close('div');

echo _open("div.description_technique.clearfix");

echo _tag('div#description', markdown($image->description));

if (!empty($commentaires))
{
  echo _open('div.commentaire.list_by_image.list');

    echo _open('ul.elements');
  
    foreach ($commentaires as $commentaire)
    {
      echo _open('li.element');
      
        echo _tag("div.clearfix",
          _media("gravatar.jpg")->set(".fleft.imgleft").
          _tag("p.date", format_date($commentaire->createdAt)).
          _tag("p.auteur", auto_link_text(escape($commentaire->authorName)))
        ).
        _tag("div.texte", nl2br(auto_link_text(escape($commentaire->body))));
        
      echo _close('li');
    }
  
    echo _close('ul');
  
  echo _close('div');
}

echo _close("div");

echo _close('div');

if($prevPage) echo _link($prevPage)->textTitle($prevPage->name)->set('#prev_image');

if($nextPage) echo _link($nextPage)->textTitle($nextPage->name)->set('#next_image');

if ($back && !$back->getNode()->isRoot())
{
  echo _link($back)->textTitle('Retour à '.$back->name)->set('#image_back');
}
else
{
  echo _link()->textTitle('Retour à l\'acceuil')->set('#image_back');
}

if($nextPage) echo _tag('a#image_play', 'Diaporama');

echo _close('div');