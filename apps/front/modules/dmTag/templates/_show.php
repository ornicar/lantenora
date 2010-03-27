<?php
/*
 * Action for Tag : Show
 * Vars : $tag
 */

echo _open('div.tag.show');

  echo _tag('span.diapo_link.none');

  echo _tag('h1.t_big', _tag('span.title_prefix', 'Tag').$dmTag);
  
echo _close('div');
