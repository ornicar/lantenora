<?php
use_helper('Date');

$table = £table()->head('Date', 'Auteur', 'Image', '');

foreach($commentaires as $commentaire)
{
  $table->body(
    format_date($commentaire->createdAt).' '.format_date($commentaire->createdAt, 't'),
    $commentaire->authorName,
    $commentaire->Record,
    _link($commentaire)->text('Voir')
  );
}

echo _tag('div.dm_box',
  _tag('div.title',
    _link('@dm_comment')->set('.s16block.s16_arrow_up_right')->title(__('Voir tous les commentaires')).
    _tag('h2', 'Derniers commentaires')
  ).
  _tag('div.dm_box_inner.dm_data', $table)
);