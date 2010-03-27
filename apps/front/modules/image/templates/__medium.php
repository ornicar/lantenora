<?php

echo
  _link($image)->text(
    £media($image->Media)
    ->size(160, 160)
    ->method('center').
    _tag('div.caption', $image->nom)
  );