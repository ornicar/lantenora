<?php

echo _open('div.clearfix');

foreach($tags as $tag)
{
  echo _link($tag)->text($tag->get('name'))
  ->set('style', 'font-size: '.round(4/5+$tag->get('nb_images')/30, 2).'em');
}

echo _close('div');