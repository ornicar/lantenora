<?php
use_helper('Date');

$table = £table()->head('Date', 'Auteur', 'Image');

foreach($commentaires as $commentaire)
{
  $table->body(_link($commentaire)->text(format_date($commentaire->createdAt).' '.format_date($commentaire->createdAt, 't')), $commentaire->auteur, $commentaire->Image->nom);
}

echo _tag('div.dm_box',
  _tag('div.title',
    _link('@commentaire')->set('.s16block.s16_arrow_up_right')->title(__('Voir tous les commentaires')).
    _tag('h2', 'Derniers commentaires')
  ).
  _tag('div.dm_box_inner.dm_data', $table)
);