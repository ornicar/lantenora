<?php
use_helper('Date');

$table = £table()->head('Date', 'Auteur', 'Image');

foreach($commentaires as $commentaire)
{
  $table->body(£link($commentaire)->text(format_date($commentaire->createdAt).' '.format_date($commentaire->createdAt, 't')), $commentaire->auteur, $commentaire->Image->nom);
}

echo £('div.dm_box',
  £('div.title',
    £link('@commentaire')->set('.s16block.s16_arrow_up_right')->title(__('Voir tous les commentaires')).
    £('h2', 'Derniers commentaires')
  ).
  £('div.dm_box_inner.dm_data', $table)
);